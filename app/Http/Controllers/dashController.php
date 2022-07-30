<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class dashController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        $categories = Category::all();
        return view('dashboard', compact('posts'));
    }
}
