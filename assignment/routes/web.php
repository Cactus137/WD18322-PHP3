<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/viewed-posts', [HomeController::class, 'viewedPosts'])->middleware('auth.check')->name('viewed-posts');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::prefix('post')->group(function () {
    Route::get('/{cSlug}/{pSlug}', [HomeController::class, 'post'])->name('post');
    Route::get('/{cSlug}', [HomeController::class, 'category'])->name('category');
});

Route::middleware('auth.check')->prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'dashboard'])->name('admin.dashboard');
    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
    });
    // Categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{slug}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/update/{slug}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/delete/{slug}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    });
    // Posts
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/edit/{slug}', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/update/{slug}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/delete/{slug}', [PostController::class, 'delete'])->name('admin.posts.delete');
    });
});
