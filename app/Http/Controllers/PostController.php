<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.post.create', [
            "categories" => Category::all(),
            "tags" => Tags::all(),
        ]);
    }
    // get sub category
    public function getSubCategory(Request $request)
    {
        $category_id = $request->category_id;
        $sub_categories_lists = SubCategory::where('category_id', $category_id)->get();
        $subCategoryName = '';
        foreach ($sub_categories_lists as  $sub_category_list) {
            $subCategoryName .= "<option value='$sub_category_list->id'> $sub_category_list->subCategory_name </option>";
        }
        return $subCategoryName;
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
            "post_heading" => "required",
            "post_slug" => "required | unique:posts,post_slug",
            "post_description" => "required",
            "post_thumbnail" => "required | mimes:png,jpg",
        ]);
        if ($request->parent_category_id == 0) {
            return back()->with('error', 'The parent category field is required.');
        }
        if ($request->post_slug) {
            $salt = "_" . Str::random(8);
            $slug = Str::slug($request->post_slug .= $salt, "_");
        } else {
            $slug = Str::slug($request->post_heading, "_");
        }
        $post_thumbnail_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('post_thumbnail')->getClientOriginalExtension();
        Image::make($request->file('post_thumbnail'))->resize(900, 600)->save(base_path('public/uploads/post_thumbnail/' . $post_thumbnail_name), 80);

        $id = Post::insertGetId([
            "post_heading" => $request->post_heading,
            "post_slug" => $slug,
            "writer_id" => Auth::guard('admin')->id(),
            "parent_category_id" => $request->parent_category_id,
            "post_thumbnail" => $post_thumbnail_name,
            "post_description" => $request->post_description,
            "post_status" => $request->post_status,
            "featured" => $request->post_featured,
            "created_at" => Carbon::now(),
        ]);

        $post = new Post();
        if ($request->subCategory_id != null) {
            foreach ($request->subCategory_id as $value) {
                $post->find($id)->relationSubCategories()->attach($value);
            }
        }
        if ($request->tag_id != null) {
            foreach ($request->tag_id as $value) {
                $post->find($id)->relationTags()->attach($value);
            }
        }
        return back()->with('success', 'post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
