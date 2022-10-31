<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function post()
    {
        $post_data = Post::find(18);
        return view('frontend.singlePost', compact('post_data'));
    }
}