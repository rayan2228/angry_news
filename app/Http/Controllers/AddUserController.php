<?php

namespace App\Http\Controllers;

use App\Mail\UserActive;
use App\Mail\UserCreated;
use App\Mail\UserInactive;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::where('id','!=',auth()->guard('admin')->user()->id)->get();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            '*'=>'required',
            'email' => 'email',
            'password'=> 'min:8',
         ]);
         Admin::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "role"=>$request->role,
            "email_verified_at"  => now(),
            "created_at"=> now(),
         ]);
         Mail::to($request->email)->send(new UserCreated($request->name,$request->email,$request->role,$request->password));
         return back()->with('success','user created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_info = Admin::find($id);
        // return $user_info;
        return view('backend.user.show', compact('user_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user_info = Admin::find($id);
        $user_email = Admin::find($id)->email;
        $user_name = Admin::find($id)->name;
        if ($user_info->status === 'active') {
            $user_info->status = 'inactive';
            Mail::to($user_email)->send(new UserInactive($user_name));
        }else{
            $user_info->status = 'active';
            Mail::to($user_email)->send(new UserActive($user_name));
        }
        $user_info->save();
        return back()->with('delete','user deactivated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return back()->with('delete','user deleted');
    }
}
