<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('admin.home');
// })->name('admin.home');

// Route::get('/about', function () {
//     return view('admin.about');
// })->name('admin.about');

// Route::get('/posts', function () {
// $posts = DB::table('posts')->get();

// Update
// DB::table('posts')
//     ->where('id', 2)
//     ->update(
//         [
//             'title' => 'This is list hot car in 2024 of the world',
//             'views' => 200
//         ]
//     );
// $posts = DB::table('posts')
//     ->select('id', 'title', 'views')
//     // ->where('views', '>', 80)
//     ->get();

//Delete
// DB::table('posts')->delete(3);
// DB::table('posts')->where('views', '<', 80)->delete();

// Join two tables
// $posts = DB::table('posts')
//     ->selectRaw('categories.name AS category, posts.title, posts.views')
//     ->join('categories', 'categories.id', '=', 'posts.category_id')
//     ->get();
// return ($posts);
// });



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');

Route::middleware('auth.check')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('admin.posts.delete');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Send mail forgot password
Route::get('/forgot-password/{username}', [SendMailController::class, 'forgotPassword'])->name('forgotPassword');