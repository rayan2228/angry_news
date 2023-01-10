@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
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
        <div class="py-3 card-header">
            <h6 class="mb-0">Create Post</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="border shadow-none card w-100">
                        <form class="row g-4" method="POST" action="{{ route('admin.post.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-2 col-12">
                                    <label class="form-label">Post Heading</label>
                                    <input type="text" class="form-control" name="post_heading"
                                        value="{{ old('post_heading') }}">
                                    @error('post_heading')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-2 col-12">
                                    <label class="form-label">Post Slug</label>
                                    <input type="text" class="form-control" name="post_slug"
                                        value="{{ old('post_slug') }}">
                                    @error('post_slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Post Thumnail</label>
                                        <input type="file" class="form-control" name="post_thumbnail">
                                        @error('post_thumbnail')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Post Featued</label>
                                        <select class="form-select" name="post_featured">
                                            <option value="deactive">deactive</option>
                                            <option value="active">active</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Choose a parent category</label>
                                        <select class="form-select" name="parent_category_id" id="parent_category">
                                            <option value="0">Choose a Parent Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (session('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Select Sub Category</label>
                                        <select class="select_js form-select" name="subCategory_id[]" id="sub_category"
                                            multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Select Tags</label>
                                        <select class="select_js form-select" name="tag_id[]" multiple="multiple">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tags_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label class="form-label">Post Status</label>
                                        <select class="form-select" name="post_status">
                                            <option value="active">active</option>
                                            <option value="deactive">deactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 col-12">
                                    <label class="form-label">Post Type</label>
                                    <select class="form-select" name="post_type">
                                        <option value="top">top</option>
                                        <option value="popular">popular</option>
                                    </select>

                                </div>
                                <div class="mb-2 col-12">
                                    <label class="form-label">Post Description</label>
                                    <textarea class="form-control" rows="50"name="post_description" id="summernote">{{ old('post_description') }}</textarea>
                                    @error('post_description')
                                        <p class="text-danger">{{ $message }}</p>

                                        @enderror

                                </div>
                                <div class="mb-2 col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Create Post</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
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
                            category_id: category_id
                        },
                        success: function(data) {
                            $("#sub_category").html(data);
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
                    title: "{{ session('success') }}"
                })
            });
        </script>
    @elseif (session('restore'))
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
                    title: "{{ session('restore') }}"
                })
            });
        </script>
    @elseif (session('error'))
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
                    icon: 'error',
                    title: "{{ session('error') }}"
                })
            });
        </script>
    @endif
    {{-- <script src="https://cdn.tiny.cloud/1/tdsho3csnxwtvih34teop0xfxe57rigbkn7odeqi4yoeyhsl/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            images_upload_url: 'rayan',
            automatic_uploads: false
        });
    </script> --}}
@endsection
@endsection
