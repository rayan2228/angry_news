<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::paginate(5);
        return view('backend.tags.create', compact('tags'));
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
            "tags_name" => "required | unique:tags,tags_name",
        ]);

        Tags::insert([
            "tags_name" => $request->tags_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'tag added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tags::find($id);
        return view('backend.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            "tags_name" => "required | unique:tags,tags_name",
        ]);

        Tags::find($id)->update([
            "tags_name" => $request->tags_name,
        ]);
        return redirect(route('admin.tags.create'))->with('update', 'tag updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tags::find($id);
        $tags->relationPosts()->detach();
        $tags->delete();
        return back()->with('delete','Tag deleted ');
    }
}
