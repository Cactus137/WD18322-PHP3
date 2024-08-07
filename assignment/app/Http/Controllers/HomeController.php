<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\UserPostVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // 5 tin tuc moi nhat theo ngay co luot xem nhieu nhat
        $breakingNews = Post::where('status_id', 2)
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();
        // Business news
        $businessNews = Post::where('category_id', 4)
            ->where('status_id', 2)
            ->limit(6)
            ->get();
        // Science news 
        $scienceNews = Post::where('category_id', 6)
            ->where('status_id', 2)
            ->limit(8)
            ->get();
        // Sport news
        $sportNews = Post::where('category_id', 8)
            ->where('status_id', 2)
            ->limit(12)
            ->get();
        // Lastest news
        $lastestNews = Post::where('status_id', 2)
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();
        // Ads 
        $ads = Ads::where('status_id', 1)
            ->limit(3)
            ->get()
            ->toArray();
        return view('pages.clients.index', compact('breakingNews', 'businessNews', 'scienceNews', 'sportNews', 'lastestNews', 'ads'));
    }

    public function category($cSlug)
    {
        $category = Category::where('slug', $cSlug)
            ->first();
        $listNews = Post::where('category_id', $category->id)
            ->where('status_id', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(18); 
        $ads = Ads::where('status_id', 1)
            ->limit(2)
            ->get();
        return view('pages.clients.category', compact('category', 'listNews', 'ads'));
    }


    public function viewedPosts()
    {
        $user = session()->get('user');
        $listId = UserPostVisit::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        $listPosts = [];
        foreach ($listId as $id) {
            $post = Post::where('id', $id->post_id)
                ->where('status_id', 2)
                ->first();
            if ($post) {
                array_push($listPosts, $post);
            }
        }
        return view('pages.clients.viewed-posts', compact('listPosts'));
    }

    public function post($cSlug, $pSlug)
    {
        $category = Category::where('slug', $cSlug)
            ->first();
        $post = Post::where('slug', $pSlug)
            ->where('category_id', $category->id)
            ->where('status_id', 2)
            ->first();
        $relatedNews = Post::where('category_id', $category->id)
            ->where('status_id', 2)
            ->where('id', '!=', $post->id)
            ->limit(7)
            ->get();
        $ads = Ads::where('status_id', 1)
            ->limit(3)
            ->get()
            ->toArray();

        // Check user visit post
        if (session()->has('user')) {
            // Check empty post in user_post_visits
            $checkExits = UserPostVisit::where('user_id', session()->get('user')->id)
                ->where('post_id', $post->id)
                ->first();
            $checkNumber = UserPostVisit::where('user_id', session()->get('user')->id)
                ->count();
            // Max 100 post
            if (!$checkExits) {
                if ($checkNumber >= 50) {
                    $minId = UserPostVisit::where('user_id', session()->get('user')->id)
                        ->orderBy('created_at', 'asc')
                        ->first();
                    UserPostVisit::where('id', $minId->id)
                        ->delete();
                }

                $dataVisit = [
                    'user_id' => session()->get('user')->id,
                    'post_id' => $post->id,
                ];
                UserPostVisit::create($dataVisit);
            }
        }
        return view('pages.clients.post', compact('category', 'post', 'relatedNews', 'ads'));
    }

    public function contact()
    {
        return view('pages.clients.contact-us');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
