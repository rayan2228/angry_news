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
                    <li class="breadcrumb-item active" aria-current="page">add tags</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Tags</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('admin.tags.update' ,['tag'=> $tag->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label class="form-label">Tag Name</label>
                                    <input type="text" class="form-control" placeholder="tag name" name="tags_name" value="{{ $tag->tags_name }}">
                                    @error('tags_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Update Tags</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end page main-->
@endsection
