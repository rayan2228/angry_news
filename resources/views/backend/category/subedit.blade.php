@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-body">
                            <form class="row g-3" method="POST"
                                action="{{ route('admin.subCategory.update', ['subcategory' => $subcategory->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Category name"
                                        name="category_name" value="{{ $subcategory->subCategory_name }}">
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" placeholder="Slug name" name="category_slug"
                                        value="{{ $subcategory->subCategory_slug }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Choose a parent category</label>
                                    <select class="form-select" name="category_id">
                                        <option value="0" selected>Choose a parent category</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}" @selected($category->id === $subcategory->category_id)>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Category Status</label>
                                    <select class="form-select" name="category_status">
                                        <option value="active"  @selected($subcategory->subCategory_status === 'active')>active
                                        </option>
                                        <option value="deactive" @selected($subcategory->subCategory_status === 'deactive')>deactive
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" cols="3" placeholder="Category Description"
                                        name="category_description">{{ $subcategory->subCategory_description }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
