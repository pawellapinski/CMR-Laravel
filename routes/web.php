<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;


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
Route::get('/post', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/post', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::post('/comments/store}', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

