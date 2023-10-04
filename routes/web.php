<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use App\Services\MailchimpNewsletter;
use App\Http\Controllers\NewsletterController;



Route::post('newsletter', NewsletterController::class);


Route::get('/',[PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}',[PostController::class,'show']);
Route::get('posts/{post:slug}/comments',[PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::middleware('can:admin')->group(function(){

    Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');

    Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');

});


