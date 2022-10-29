@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3 text-white">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            {{-- <div class="btn-group">
                <button type="button" class="btn btn-light">Settings</button>
                <button type="button" class="btn btn-light split-bg-light dropdown-toggle dropdown-toggle-split"
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

    <div class="profile-cover bg-dark"></div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <div class="card border shadow-none">
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">Email address</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->guard('admin')->user()->email }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->guard('admin')->user()->name }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card border shadow-none">
                        <div class="card-header">
                            <h6 class="mb-0">CONTACT INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->guard('admin')->user()->address }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->guard('admin')->user()->city }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->guard('admin')->user()->country }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control" rows="4" cols="4" placeholder="Describe yourself...">{{ auth()->guard('admin')->user()->about_me }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-start">
                        <button type="button" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card overflow-hidden border-0 shadow-sm">
                <div class="card-body">
                    <div class="profile-avatar  text-center">
                        <img src="{{ asset('backend') }}/assets/images/avatars/avatar-1.png" class="rounded-circle shadow"
                            width="120" height="120" alt="">
            
                    </div> 
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="text-secondary mb-0">Posts</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="text-secondary mb-0">Comments</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h4 class="mb-1">{{ auth()->guard('admin')->user()->name }}</h4>
                        <p class="text-secondary mb-0">{{ auth()->guard('admin')->user()->role }}</p>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">{{ auth()->guard('admin')->user()->email }}</h6>
                    </div>
                    <hr>
                    <div class="text-start">
                        <h5 class="">About</h5>
                        <p class="mb-0">{{ auth()->guard('admin')->user()->about_me }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end row-->
@endsection
