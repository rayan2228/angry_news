<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tags;
use Carbon\Carbon;
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

        $posts = Post::paginate(5);
        $trashPosts = Post::onlyTrashed()->get();
        return view('backend.post.index', compact('posts', 'trashPosts'));
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
            $salt = "_" . rand(1, 10);
            $slug = Str::slug($request->post_slug .= $salt, "_");
        } else {
            $slug = Str::slug($request->post_heading, "_");
        }
        $post_thumbnail_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('post_thumbnail')->getClientOriginalExtension();
        Image::make($request->file('post_thumbnail'))->resize(900, 600)->save(base_path('public/uploads/post_thumbnail/' . $post_thumbnail_name), 80);


        $post_description = $request->post_description;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $post_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    // must include this to avoid font problem
        $images = $dom->getElementsByTagName('img');
        if (count($images) > 0) {
            foreach ($images as  $img) {
                $src = $img->getAttribute('src');
                # if the img source is 'data-url'
                if (preg_match('/data:image/', $src)) {
                    # get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    # Generating a random filename
                    $filename =
                        Str::limit($slug, 5) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y');
                    $filepath = "uploads/post_thumbnail/$filename.$mimetype";
                    $image = Image::make($src)
                        ->encode($mimetype, 100)
                        ->save(public_path($filepath), 80);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                }
            }
        }
        # modified entity ready to store in database
        $post_description = $dom->saveHTML($dom->documentElement);
        $id = Post::insertGetId([
            "post_heading" => $request->post_heading,
            "post_slug" => $slug,
            "writer_id" => Auth::guard('admin')->id(),
            "parent_category_id" => $request->parent_category_id,
            "post_thumbnail" => $post_thumbnail_name,
            "post_description" => $post_description,
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
        return view('backend.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tags::all();
        $subCategory = $post->relationSubCategories;
        return view('backend.post.edit', compact('post', 'categories', 'tags', 'subCategory'));
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
        $request->validate([
            "post_heading" => "required",
            "post_slug" => "required | unique:posts,post_slug," . $post->id,
            "post_description" => "required",
            "post_thumbnail" => " mimes:png,jpg",
        ]);
        $slug = Str::slug($request->post_slug, "_");
        if ($request->parent_category_id == 0) {
            return back()->with('error', 'The parent category field is required.');
        }
        if ($request->hasFile('post_thumbnail')) {
            unlink(base_path('public/uploads/post_thumbnail/' . $post->post_thumbnail));
            $post_thumbnail_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('post_thumbnail')->getClientOriginalExtension();
            Image::make($request->file('post_thumbnail'))->resize(900, 600)->save(base_path('public/uploads/post_thumbnail/' . $post_thumbnail_name), 80);
            $post->update([
                "post_thumbnail" => $post_thumbnail_name,
            ]);
        }
        // summernote update
        $post_description = $request->post_description;
        $old_post_description = $post->post_description;
        if ($old_post_description !== $post_description) {
            libxml_use_internal_errors(true);
            $dom = new \DomDocument();
            $dom->loadHtml('<?xml encoding="utf-8" ?>' . $old_post_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    // must include this to avoid font problem
            $images = $dom->getElementsByTagName('img');
            if (count($images) > 0) {
                foreach ($images as  $img) {
                    $src = $img->getAttribute('src');
                    $filename = last(explode("/", $src));
                    unlink(base_path('public/uploads/post_thumbnail/' . $filename));
                    $img->removeAttribute('src');
                    # if the img source is 'data-url'
                    if (preg_match('/data:image/', $src)) {
                        unlink(base_path('public/uploads/post_thumbnail/' . $filename));
                        $img->removeAttribute('src');
                    }
                }
            }
            # modified entity ready to store in database
            $post_description = $dom->saveHTML($dom->documentElement);
            $post->update([
                "post_description" => null,
            ]);
            $post->update([
                "post_description" => $request->post_description,
            ]);
        }
        // normal data update
        $post->update([
            "post_heading" => $request->post_heading,
            "post_slug" => $slug,
            "writer_id" => Auth::guard('admin')->id(),
            "parent_category_id" => $request->parent_category_id,
            "post_status" => $request->post_status,
            "featured" => $request->post_featured,
        ]);
        if ($request->subCategory_id != null) {
            $post->relationSubCategories()->detach();
            foreach ($request->subCategory_id as $value) {
                $post->relationSubCategories()->attach($value);
            }
        }
        if ($request->tag_id != null) {
            $post->relationTags()->detach();
            foreach ($request->tag_id as $value) {
                $post->relationTags()->attach($value);
            }
        }
        return back()->with('update', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('delete','post in trash');
    }
    public function restore($post)
    {
        Post::onlyTrashed()->find($post)->restore(); 
        return back()->with('restore','post restored');
    }
    public function trash($post)
    {
        $post_data= Post::onlyTrashed()->find($post);
        $post_data->relationSubCategories()->detach();
        $post_data->relationTags()->detach();
        return back()->with('delete','post deleted');
    }
}
