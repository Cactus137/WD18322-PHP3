<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $currentRoute;

    public function __construct()
    {
        $this->currentRoute = 'admin.dashboard';
        view()->share('currentRoute', $this->currentRoute);
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $newUsers = User::where('created_at', '>=', now()->subDays(7))->count();
        $totalCategories = Category::count();
        $totalPosts = Post::count();
        // Top 10 posts by view count
        $topPosts = Post::orderBy('view_count', 'desc')->take(10)->get();
        // count totalPosts by category
        $categories = Category::all();
        $categoryPosts = [];
        foreach ($categories as $category) {
            $categoryPosts[$category->name] = $category->posts->count();
        } 
        // dd($categoryPosts);
        return view('pages.admins.dashboard', compact('totalUsers', 'newUsers', 'totalCategories', 'totalPosts', 'topPosts' , 'categoryPosts'));
    }
}
