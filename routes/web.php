<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/edit/{post}',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/update/{id}',[PostController::class,'update'])->name('posts.update');

Route::DElETE('/post/destroy/{id}',[PostController::class,'destroy'])->name('posts.destroy');
Route::get('/post/hdelelet', [PostController::class, 'hdelelet'])->name('posts.hdelelet');
Route::get('/post/restore{id}', [PostController::class, 'restore'])->name('posts.restore');
Route::Delete('/post/forcdelete{id}', [PostController::class, 'forcdelete'])->name('posts.forcdelete');


Route::get('/comment',[CommentController::class,'index'])->name('comment');
Route::get('/comment/create/{id}',[CommentController::class,'create'])->name('comment.create');
Route::post('/comment/store/{id}',[CommentController::class,'store'])->name('comment.store');
Route::get('/comment/show',[CommentController::class,'show'])->name('comment.show');
Route::DElETE('/comment/destroy/{id}',[CommentController::class,'destroy'])->name('comment.destroy');
Route::get('/comment/hdelelet', [CommentController::class, 'hdelelet'])->name('comment.hdelelet');
Route::get('/comment/restore{id}', [CommentController::class, 'restore'])->name('comment.restore');
Route::Delete('/comment/forcdelete{id}', [CommentController::class, 'forcdelete'])->name('comment.forcdelete');