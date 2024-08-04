<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStatus;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $currentRoute;

    public function __construct()
    {
        $this->currentRoute = 'admin.category';
        view()->share('currentRoute', $this->currentRoute);
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('pages.admins.categories.list', compact('categories'));
    }

    public function create()
    {
        $status = CategoryStatus::all();
        return view('pages.admins.categories.create', compact('status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'status_id' => 'required|integer',
        ], [
            'status_id.required' => 'The status field is required.',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'status_id' => $request->status_id,
        ];

        Category::create($data);
        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $status = CategoryStatus::all();
        return view('pages.admins.categories.edit', compact('category', 'status'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $slug . ',slug',
            'status_id' => 'required|integer',
        ], [
            'status_id.required' => 'The status field is required.',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'status_id' => $request->status_id,
        ];

        $category = Category::where('slug', $slug)->first();
        $category->update($data);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }
}
