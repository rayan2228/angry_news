<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        $trashCategories = Category::onlyTrashed()->get();
        $categories = Category::paginate(5);
        $subCategories = SubCategory::with('relationCategory')->paginate(5);
        $trashSubCategories = SubCategory::with('relationCategory')->onlyTrashed()->get();
        return view('backend.category.create', compact('categories', 'subCategories', 'allCategories', 'trashCategories', 'trashSubCategories'));
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
            "category_name" => "required | unique:categories,category_name",
            "category_slug" => "unique:categories,category_slug",
            "category_image" => "required | mimes:png,jpg",
        ]);
        if ($request->category_slug) {
            $salt = "_" . Str::random(8);
            $slug = Str::slug($request->category_slug .= $salt, "_");
        } else {
            $slug = Str::slug($request->category_name, "_");
        }
        // sub category
        if ($request->category_id != 0) {
            $request->validate([
                "category_name" => "required | unique:sub_categories,subCategory_name",
                "category_slug" => "unique:sub_categories,subCategory_slug",
                "category_image" => "required | mimes:png,jpg",
            ]);
            $subCategory_image_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('category_image')->getClientOriginalExtension();
            Image::make($request->file('category_image'))->save(base_path('public/uploads/subCategory_image/' . $subCategory_image_name), 80);
            SubCategory::insert([
                "subCategory_name" => $request->category_name,
                "subCategory_slug" => $slug,
                "subCategory_image" => $subCategory_image_name,
                "category_id" => $request->category_id,
                "subCategory_description" => $request->category_description,
                "subCategory_status" => $request->category_status,
                'created_at' => Carbon::now(),
            ]);
        } else {
            $category_image_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('category_image')->getClientOriginalExtension();
            Image::make($request->file('category_image'))->save(base_path('public/uploads/category_image/' . $category_image_name), 80);
            Category::insert([
                "category_name" => $request->category_name,
                "category_slug" => $slug,
                "category_image" => $category_image_name,
                "category_description" => $request->category_description,
                "category_status" => $request->category_status,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->back()->with('success', 'category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    public function subEdit(SubCategory $subcategory)
    {
        $allCategories = Category::all();
        return view('backend.category.subedit', compact('subcategory', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "category_name" => "required | unique:categories,category_name",
            "category_slug" => "unique:categories,category_slug",
            "category_image" => "mimes:png,jpg",
        ]);
        if ($request->category_slug) {
            $salt = "_" . Str::random(8);
            $slug = Str::slug($request->category_slug .= $salt, "_");
        } else {
            $slug = Str::slug($request->category_name, "_");
        }
        if ($request->hasFile('category_image')) {
            unlink(base_path('public/uploads/subCategory_image/' . $category->category_image));
            $subCategory_image_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('category_image')->getClientOriginalExtension();
            Image::make($request->file('category_image'))->save(base_path('public/uploads/subCategory_image/' . $subCategory_image_name), 80);
            $category->update([
                "subCategory_image" => $subCategory_image_name,
            ]);
        }
        $category->update([
            "category_name" => $request->category_name,
            "category_slug" => $slug,
            "category_description" => $request->category_description,
            "category_status" => $request->category_status,
        ]);
        return redirect(route('admin.category.create'))->with('update', 'category updated');
    }
    public function subUpdate(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            "category_name" => "required | unique:sub_categories,subCategory_name",
            "category_slug" => "unique:sub_categories,subCategory_slug",
            "category_image" => "mimes:png,jpg",
        ]);
        if ($request->category_slug) {
            $salt = "_" . Str::random(8);
            $slug = Str::slug($request->category_slug .= $salt, "_");
        } else {
            $slug = Str::slug($request->category_name, "_");
        }
        if ($request->hasFile('category_image')) {
            unlink(base_path('public/uploads/category_image/' . $subcategory->category_image));
            $category_image_name = Str::limit($slug, 10) . '_' . Auth::guard('admin')->id() . '_' . time() . '_' . Carbon::now()->format('Y') . '.' . $request->file('category_image')->getClientOriginalExtension();
            Image::make($request->file('category_image'))->save(base_path('public/uploads/category_image/' . $category_image_name), 80);
            $subcategory->update([
                "category_image" => $category_image_name,
            ]);
        }
        $subcategory->update([
            "subCategory_name" => $request->category_name,
            "subCategory_slug" => $slug,
            "category_id" => $request->category_id,
            "subCategory_description" => $request->category_description,
            "subCategory_status" => $request->category_status,
        ]);
        return redirect(route('admin.category.create'))->with('update', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $subCategories = SubCategory::where('category_id', $category->id)->get();
        foreach ($subCategories as  $subCategory) {
            $subCategory->delete();
        }
        $category->delete();
        return back()->with('delete', 'category deleted');
    }
    public function trash($category)
    {
        $subCategories = SubCategory::onlyTrashed()->where('category_id', $category)->get();
        foreach ($subCategories as  $subCategory) {
            unlink(base_path('public/uploads/subCategory_image/' . $subCategory->subCategory_image));
            $subCategory->forceDelete();
        }
        $category =  Category::onlyTrashed()->find($category);
        unlink(base_path('public/uploads/category_image/' . $subCategory->category_image));
        $category->forceDelete();
        return back()->with('delete', 'category deleted');
    }
    public function subDestroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('delete', 'category deleted');
    }
    public function subDelete($subcategory)
    {
        $subCategory = SubCategory::onlyTrashed()->find($subcategory);
        unlink(base_path('public/uploads/subCategory_image/' . $subCategory->subCategory_image));
        $subCategory->forceDelete();
        return back()->with('delete', 'category deleted');
    }

    // restore category
    public function restore($category)
    {
        Category::onlyTrashed()->find($category)->restore();
        return back()->with('restore', 'category restored');
    }
    public function subRestore($subcategory)
    {
        $hasParentCategory = SubCategory::onlyTrashed()->find($subcategory)->category_id;
        $checkParentCategoryOnTrash = Category::onlyTrashed()->find($hasParentCategory)->deleted_at ?? 0;
        if ($checkParentCategoryOnTrash) {
            return back()->with('error', 'parent category on trash');
        } else {
            SubCategory::onlyTrashed()->find($subcategory)->restore();
            return back()->with('restore', 'category restored');
        }
    }
}
