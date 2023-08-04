<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get(),
        'categories' => Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [

    'post' => $post

    ]);

Route::get('<categories/{category::slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('<author/{author}', function(User $author){
    return view('posts', [
        'posts' => $author->posts
    ]);
});

});

