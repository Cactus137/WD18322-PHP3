<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.home', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required'
        ]);


        $data = $request->except('imageUrl');
        $data['imageUrl'] = '';

        if ($request->hasFile('imageUrl')) {
            $file = $request->file('imageUrl');
            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('storage/images'), $fileName);
            $data['imageUrl'] = $fileName;
        }

        if (Post::create($data)) {
            return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
        }

        return back()->with('error', 'Post creation failed');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);


        $data = $request->except('imageUrl');
        $data['imageUrl'] = $post->imageUrl;

        if ($request->hasFile('imageUrl')) {
            $file = $request->file('imageUrl');
            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('storage/images'), $fileName);
            $data['imageUrl'] = $fileName;

            // Remove old image
            if (file_exists(public_path('storage/images/' . $post->imageUrl))) {
                unlink(public_path('storage/images/' . $post->imageUrl));
            }
        }

        if ($post->update($data)) {
            return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
        }

        return back()->with('error', 'Post update failed');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if ($post->delete()) {
            return redirect()->route('admin.posts.edit', $post->id)->with('success', 'Post deleted successfully');
        } else {
            return redirect()->route('admin.posts.edit', $post->id)->with('error', 'Post deletion failed');
        }
    }
}
