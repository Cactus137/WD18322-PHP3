<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('admin.home');
})->name('admin.home');

Route::get('/about', function () {
    return view('admin.about');
})->name('admin.about');

Route::get('/counter', function () {
    return view('livewire.counter');
})->name('livewire.counter');

Route::get('/posts', function () {
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
    $posts = DB::table('posts')
        ->selectRaw('categories.name AS category, posts.title, posts.views')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->get();
    return ($posts);
});

Route::prefix('admin/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
    // Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    // Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
    // Route::get('/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
    // Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    // Route::put('/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    // Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});
