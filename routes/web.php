<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CountryController;
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

// Route::get('/profiles', function () {
//     return view('profiles.index');
// });


Auth::routes();

// //__connent__
Route::post('/posts{post}/comment',[CommentController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts{post}/liked',[CommentController::class, 'stores'])->name('post.store')->middleware('auth');
Route::get('/comments{comment}/liked',[CommentController::class, 'commentlike'])->name('commentlike.store')->middleware('auth');
//__posts route__
Route::get('/posts', [PostController::class, 'index'])->name('posts.home');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}/edit', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}/approve', [PostController::class, 'approves'])->name('posts.approve');
Route::delete('/posts/{id}/delete',[PostController::class, 'destroy'])->name('posts.destroy');

//....page.......//
Route::get('/',[HomeController::class, 'pageindex'])->name('home');
Route::get('/posts/{post}',[HomeController::class, 'show'])->name('post.show');

//__categories route__
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.home');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/delete',[CategoryController::class, 'destroy'])->name('categories.destroy');

//tag route__
Route::get('/tags', [TagController::class, 'index'])->name('tags.home');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags/store', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::patch('/tags/{tag}/edit', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/{id}/delete',[TagController::class, 'destroy'])->name('tags.destroy');


//__profiles route__
//__dash__
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.home');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profiles.store');

//searchcatagory route__
Route::get('/posts/{category}/category', [SearchController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
//country route__
Route::resource('/countries', CountryController::class);

