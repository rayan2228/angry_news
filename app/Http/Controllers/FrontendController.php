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
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function authors()
    {
        return view('frontend.author');
    }
    public function single_author()
    {
        return view('frontend.single_author');
    }
    public function search()
    {
        return view('frontend.post-list');
    }
    public function archive()
    {
        return view('frontend.archive');
    }
   
}