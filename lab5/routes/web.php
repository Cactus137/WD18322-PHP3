<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'index'])->name('movies.list');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/create', [MovieController::class, 'store'])->name('movies.store');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/edit/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/delete/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
