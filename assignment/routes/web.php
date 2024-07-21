<?php

use App\Http\Controllers\HomeController;
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
Route::get('/viewed-posts', [HomeController::class, 'viewedPosts'])->name('viewed-posts');
Route::get('/login', [HomeController::class, 'login'])->name('auth.login');
Route::get('/register', [HomeController::class, 'register'])->name('auth.register');
Route::get('/logout', [HomeController::class, 'logout'])->name('auth.logout');
Route::get('/forgot-password', [HomeController::class, 'forgotPassword'])->name('auth.forgot-password');
Route::get('/reset-password', [HomeController::class, 'resetPassword'])->name('auth.reset-password');

Route::get('/{cSlug}/{pSlug}', [HomeController::class, 'post'])->name('post');
Route::get('/{cSlug}', [HomeController::class, 'category'])->name('category');
