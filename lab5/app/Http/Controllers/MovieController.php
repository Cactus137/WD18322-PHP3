<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // reverse id
        $movies = Movie::orderBy('id', 'desc')->paginate(10);
        return view('movies.list', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'release_date' => 'required',
            'intro' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('poster');

        $data['poster'] = null;

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/movies', $filename); 
            $data['poster'] = $filename;
        }

        if (Movie::create($data)) {
            return redirect()->route('movies.list')->with('success', 'Movie created successfully');
        } else {
            return redirect()->route('movies.create')->with('error', 'Failed to create movie');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return view('movies.detail', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);

        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'release_date' => 'required',
            'intro' => 'required',
        ]);
        $data = $request->except('poster');

        $data['poster'] = $movie->poster;

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/movies', $filename);
            $data['poster'] = $filename;
            // delete old poster
            if (Storage::exists('public/movies/' . $movie->poster)) {
                Storage::delete('public/movies/' . $movie->poster);
            }
        }

        if ($movie->update($data)) {
            return redirect()->route('movies.edit', $movie->id)->with('success', 'Movie updated successfully');
        } else {
            return redirect()->route('movies.edit', $movie->id)->with('error', 'Failed to update movie');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if ($movie->delete()) {
            // delete poster
            if (Storage::exists('public/movies/' . $movie->poster)) {
                Storage::delete('public/movies/' . $movie->poster);
            }
            return redirect()->route('movies.list')->with('success', 'Movie deleted successfully');
        } else {
            return redirect()->route('movies.list')->with('error', 'Failed to delete movie');
        }
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $movies = Movie::where('title', 'like', '%' . $search . '%')->paginate(10);
        return view('movies.search', compact('movies'));
    }
}
