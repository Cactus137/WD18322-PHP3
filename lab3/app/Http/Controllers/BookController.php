<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')->orderByDesc('id')->get();
        return view('pages.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('pages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication' => 'required',
        ]);

        $dataBooks = [
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'thumbnail' => $request->thumbnail,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication' => $request->publication,
        ];

        DB::table('books')->insert($dataBooks);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $categories = DB::table('categories')->get();

        return view('pages.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication' => 'required',
        ]);

        $dataBooks = [
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'thumbnail' => $request->thumbnail,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication' => $request->publication,
        ];

        DB::table('books')->where('id', $id)->update($dataBooks);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('books')->where('id', $id)->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
