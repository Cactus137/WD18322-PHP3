<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');

// Check authentication
Route::middleware('auth.check')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('profile');
    Route::get('/change-profile', [HomeController::class, 'changeProfile'])->name('changeProfile');
    Route::post('/change-profile', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('updatePassword');
});

Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{id}/edit', [UserController::class, 'update'])->name('users.update');
});

Route::get('/calendar', [CalendarController::class, 'calendar'])->name('calendar');
Route::get('/calendar/{year}/{month}/{day}', [CalendarController::class, 'getCalendar'])->name('getCalendar');
// Next and previous month  