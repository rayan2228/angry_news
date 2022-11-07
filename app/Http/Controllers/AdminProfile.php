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
    public function update(Request $request, $profile_id)
    {
        $request->validate([
            'about_me' => "max:500",
            "profile_pic" => "mimes:png,jpg",
            "cover_pic" => "mimes:png,jpg",
        ]);
        if ($request->hasFile('profile_pic')) {
            $profile_pic_name = Auth::guard('admin')->id() . '.' . $request->file('profile_pic')->getClientOriginalExtension();
            Image::make($request->file('profile_pic'))->resize(120, 120)->save(base_path('public/uploads/profile_pics/' . $profile_pic_name), 80);
            Admin::find($profile_id)->update([
                "profile_pic" => $profile_pic_name,
            ]);
        }
        if ($request->hasFile('cover_pic')) {
            $cover_pic_name = Auth::guard('admin')->id() . '.' . $request->file('profile_pic')->getClientOriginalExtension();
            Image::make($request->file('cover_pic'))->resize(1920, 1080)->save(base_path('public/uploads/cover_pics/' . $cover_pic_name), 80);
            Admin::find($profile_id)->update([
                "cover_pic" => $cover_pic_name,
            ]);
        }
        Admin::find($profile_id)->update([
            "name" => $request->name,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "city" => $request->city,
            "country" => $request->country,
            "about_me" => $request->about_me,
        ]);
        return back()->with('update', 'profile updated');
    }
    
}
