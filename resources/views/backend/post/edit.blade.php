@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            {{-- <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div> --}}
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card w-100 border shadow-none">
                        <form class="row g-4" method="POST"
                            action="{{ route('admin.post.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-12 mb-2">
                                    <label class="form-label">Post Heading</label>
                                    <input type="text" class="form-control" name="post_heading"
                                        value="{{ $post->post_heading }}">
                                    @error('post_heading')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">Post Slug</label>
                                    <input type="text" class="form-control" name="post_slug"
                                        value="{{ $post->post_slug }}">
                                    @error('post_slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Post Thumnail</label>
                                        <input type="file" class="form-control" name="post_thumbnail">
                                        @error('post_thumbnail')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Post Featued</label>
                                        <select class="form-select" name="post_featured">
                                            <option value="deactive" @if ($post->featured === 'deactive') selected @endif>
                                                deactive</option>
                                            <option value="active" @if ($post->featured === 'active') selected @endif>active
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Choose a parent category</label>
                                        <select class="form-select" name="parent_category_id" id="parent_category">
                                            <option value="0">Choose a Parent Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($post->parent_category_id === $category->id) selected @endif>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (session('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Select Sub Category</label>
                                        <select class="select_js form-select" name="subCategory_id[]" id="sub_category"
                                            multiple="multiple">
                                            @foreach ($subCategory as $item)
                                                <option value="{{ $item->id }}" selected>{{ $item->subCategory_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="mb-2 col-6">
                                        <div class="row">
                                            <div class="mb-2 col-10">
                                                <label class="form-label">Add Tags</label>
                                                <input type="text" class="form-control" name="tag" id="tags_value">
                                            </div>
                                            <div class="mt-4 col-2">
                                                <button class="btn btn-info" id="add_tag">Add</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Select Tags</label>
                                        <select class="select_js form-select" name="tag_id[]" multiple="multiple">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @foreach ($post->relationTags as $item)
                                                @if ($item->pivot->tag_id === $tag->id) selected @endif @endforeach>
                                                    {{ $tag->tags_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Post Status</label>
                                        <select class="form-select" name="post_status">
                                            <option value="active" @if ($post->post_status === 'active') selected @endif>active
                                            </option>
                                            <option value="deactive" @if ($post->post_status === 'deactive') selected @endif>
                                                deactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <label class="form-label">Post Description</label>
                                    <textarea class="form-control" name="post_description" id="summernote">{{ $post->post_description }}</textarea>
                                    @error('post_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">update Post</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@section('footer_script')
    <script>
        $(document).ready(function() {
            // category ajax
            $('#parent_category').change(function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/admin/post/subcategorylist',
                        data: {
                            category_id: category_id,
                        },
                        success: function(data) {
                            $("#sub_category").empty();
                            $("#sub_category").html(data);
                            // alert(data)
                        }
                    });
                }
            })
        })
    </script>
    @if (session('success'))
        <script>
            $(document).ready(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: "{{ session('update') }}"
                })
            });
        </script>
    @endif
@endsection
@endsection
