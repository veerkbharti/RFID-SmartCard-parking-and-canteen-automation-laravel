<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $posts = Post::paginate(15);
        // $categories = Category::all();

        // $data = compact('categories', 'posts');
        return view('frontend.index');
    }
}
