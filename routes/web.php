<?php

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Account\PostController as AccountPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController as RegisterUserController;
use App\Http\Controllers\Blog\IndexController as BlogIndexController;
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

Route::group(['namespace' => 'Account', 'prefix' => 'account',  'middleware' => ['auth', 'author', 'verified']], function () {

    Route::get('/', [AccountIndexController::class, 'index'])->name('account');
    Route::get('/profile', [AccountIndexController::class, 'showProfile'])->name('showProfile');

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [AccountPostController::class, 'index'])->name('showUserPosts');
        Route::get('/create', [AccountPostController::class, 'create'])->name('createUserPost');
        Route::post('/store', [AccountPostController::class, 'store'])->name('storeUserPost');
        Route::get('/{slug}', [AccountPostController::class, 'show'])->name('showUserPost');
        Route::get('/{post}/edit', [AccountPostController::class, 'edit'])->name('editUserPost');
        Route::put('/{post}', [AccountPostController::class, 'update'])->name('updateUserPost');
        Route::delete('/{post}', [AccountPostController::class, 'destroy'])->name('destroyUserPost');
    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {

    Route::get('/', [AdminIndexController::class, 'index'])->name('home');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('showCategories');
        Route::get('/create', [CategoryController::class, 'create'])->name('createCategory');
        Route::post('/store', [CategoryController::class, 'store'])->name('storeCategory');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('updateCategory');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('showPosts');
        Route::get('/create', [AdminPostController::class, 'create'])->name('createPost');
        Route::post('/store', [AdminPostController::class, 'store'])->name('storePost');
        Route::get('/{slug}', [AdminPostController::class, 'show'])->name('showPost');
        Route::get('/{post}/edit', [AdminPostController::class, 'edit'])->name('editPost');
        Route::put('/{post}', [AdminPostController::class, 'update'])->name('updatePost');
        Route::delete('/{post}', [AdminPostController::class, 'destroy'])->name('destroyPost');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('showTags');
        Route::get('/create', [TagController::class, 'create'])->name('createTag');
        Route::post('/store', [TagController::class, 'store'])->name('storeTag');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('editTag');
        Route::put('/{tag}', [TagController::class, 'update'])->name('updateTag');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroyTag');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('showUsers');
        Route::get('/create', [UserController::class, 'create'])->name('createUser');
        Route::post('/store', [UserController::class, 'store'])->name('storeUser');
        Route::get('/{user}', [UserController::class, 'show'])->name('showUser');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('editUser');
        Route::put('/{user}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroyUser');
    });
});

Route::group(['namespace' => 'Blog'], function () {
    Route::get('/', [BlogIndexController::class, 'index'])->name('blog');
    Route::get('/posts/{slug}', [BlogIndexController::class, 'show'])->name('singlePost');
    Route::get('/categories/{slug}', [BlogIndexController::class, 'category'])->name('showCategory');
    Route::get('/categories/{slug}', [BlogIndexController::class, 'showCategoryPosts'])->name('showCategory');
    Route::get('/tags/{item}', [BlogIndexController::class, 'showTagPosts'])->name('showTag');
});

Auth::routes(['verify' => true]);
