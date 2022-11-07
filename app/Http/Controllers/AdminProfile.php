<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProfile extends Controller
{
    public function index()
    {
        return view('backend.profile.profileSettings');
    }
    
}
