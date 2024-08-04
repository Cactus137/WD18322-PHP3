<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostStatus;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $currentRoute;

    public function __construct()
    {
        $this->currentRoute = 'admin.post';
        view()->share('currentRoute', $this->currentRoute);
    }
    
    public function index()
    {
        // descending order
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admins.posts.list', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $status = PostStatus::all();
        return view('pages.admins.posts.create', compact('categories', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string',
            'category_id' => 'required',
            'status_id' => 'required',
            'content' => 'required|string',
        ], [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must be less than 255 characters.',
            'title.unique' => 'The title has already been taken.',
            'thumbnail.required' => 'The thumbnail field is required.',
            'thumbnail.image' => 'The thumbnail must be an image.',
            'thumbnail.mimes' => 'The thumbnail must be a file of type: jpeg, png, jpg, gif, svg.',
            'thumbnail.max' => 'The thumbnail may not be greater than 2048 kilobytes.',
            'author.required' => 'The author field is required.',
            'author.string' => 'The author field must be a string.',
            'category_id.required' => 'The category field is required.',
            'status_id.required' => 'The status field is required.',
            'content.required' => 'The content field is required.',
        ]);

        $data = $request->except('thumbnail');
        $data['slug'] = $this->createSlug($request->title);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/posts');
            $image->move($destinationPath, $name);
            $data['thumbnail'] = $name;
        }

        Post::create($data);
        return redirect()->route('admin.posts')->with('success', 'Post created successfully');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();
        $status = PostStatus::all(); 
        return view('pages.admins.posts.edit', compact('post', 'categories', 'status'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string',
            'category_id' => 'required',
            'status_id' => 'required',
            'content' => 'required|string',
        ], [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must be less than 255 characters.',
            'title.unique' => 'The title has already been taken.',
            'thumbnail.image' => 'The thumbnail must be an image.',
            'thumbnail.mimes' => 'The thumbnail must be a file of type: jpeg, png, jpg, gif, svg.',
            'thumbnail.max' => 'The thumbnail may not be greater than 2048 kilobytes.',
            'author.required' => 'The author field is required.',
            'author.string' => 'The author field must be a string.',
            'category_id.required' => 'The category field is required.',
            'status_id.required' => 'The status field is required.',
            'content.required' => 'The content field is required.',
        ]);
        $post = Post::where('slug', $slug)->first();
        $data = $request->except('thumbnail');
        $data['slug'] = $this->createSlug($request->title);
        $data['thumbnail'] = $post->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/posts');
            $image->move($destinationPath, $name);
            $data['thumbnail'] = $name;

            if (file_exists(public_path('/uploads/posts/' . $post->thumbnail))) {
                unlink(public_path('/uploads/posts/' . $post->thumbnail));
            }
        }

        $post->update($data);
        return redirect()->route('admin.posts')->with('success', 'Post updated successfully');
    }

    public function delete($slug)
    {
        Post::where('slug', $slug)->delete();

        if (file_exists(public_path('/uploads/posts/' . $slug))) {
            unlink(public_path('/uploads/posts/' . $slug));
        }

        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully');
    }
}
