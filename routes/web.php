<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('home');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('showCategories');
        Route::get('/create', [CategoryController::class, 'create'])->name('createCategory');
        Route::post('/store', [CategoryController::class, 'store'])->name('storeCategory');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('updateCategory');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('showPosts');
        Route::get('/create', [PostController::class, 'create'])->name('createPost');
        Route::post('/store', [PostController::class, 'store'])->name('storePost');
        Route::get('/{slug}', [PostController::class, 'show'])->name('showPost');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('editPost');
        Route::put('/{post}', [PostController::class, 'update'])->name('updatePost');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroyPost');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('showTags');
        Route::get('/create', [TagController::class, 'create'])->name('createTag');
        Route::post('/store', [TagController::class, 'store'])->name('storeTag');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('editTag');
        Route::put('/{tag}', [TagController::class, 'update'])->name('updateTag');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroyTag');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('showUsers');
        Route::get('/create', [UserController::class, 'create'])->name('createUser');
        Route::post('/store', [UserController::class, 'store'])->name('storeUser');
        Route::get('/{user}', [UserController::class, 'show'])->name('showUser');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('editUser');
        Route::put('/{user}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroyUser');
    });
});

Auth::routes();
