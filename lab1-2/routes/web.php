<?php
 
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
    $books = DB::table('books')->get();
    $categories = DB::table('categories')->get();
    return view('pages.home', compact('books', 'categories'));
})->name('home');

Route::get('/detail/{id}', function ($id) {
    $book = DB::table('books')->where('id', $id)->first();
    $relatedBooks = DB::table('books')->where('category_id', $book->category_id)->take(8)->get();
    return view('pages.detail', compact('book', 'relatedBooks'));
})->name('detail');

// Category books
Route::get('/category/{id}', function ($id) { 
    $categories = DB::table('categories')->get();
    $category = DB::table('categories')->where('id', $id)->first();
    $books = DB::table('books')->where('category_id', $id)->get();
    return view('pages.category', compact('categories', 'category', 'books'));
})->name('category');

// 8ps with the highest price
Route::get('/8ps/highest', function () { 
    $categories = DB::table('categories')->get();
    $books = DB::table('books')->orderBy('price', 'desc')->take(8)->get();
    $title = '8ps with the highest price';
    return view('pages.8ps', compact('categories', 'books', 'title'));
})->name('8ps.highest');

// 8ps with the lowest
Route::get('/8ps/lowest', function () {
    $categories = DB::table('categories')->get();
    $books = DB::table('books')->orderBy('price', 'asc')->take(8)->get();
    $title = '8ps with the lowest price';
    return view('pages.8ps', compact('categories', 'books', 'title'));
})->name('8ps.lowest');
