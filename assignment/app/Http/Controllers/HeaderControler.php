<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderControler extends Controller
{
    public function index()
    {
        $categories = Category::where('status_id', 1)->get();
        return view('partials.clients.header', compact('categories'));
    }
}
