<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
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

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('');


