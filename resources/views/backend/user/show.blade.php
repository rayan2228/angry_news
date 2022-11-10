@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="text-white breadcrumb-title pe-3">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="text-white bx bx-home-alt"></i></a>
                    </li>
                    <li class="text-white breadcrumb-item active" aria-current="page">User Profile</li>
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

    <div class="profile-cover bg-dark" @if ($user_info->cover_pic )
        style="background: url({{ asset('uploads/cover_pics') }}/{{ $user_info->cover_pic }});background-size:cover;"
    @endif>
    </div>

    <div class="justify-content-center row">
        <div class="col-12 col-lg-6">
            <div class="overflow-hidden border-0 shadow-sm card">
                <div class="card-body">
                    <div class="text-center profile-avatar">
                        @if ($user_info->profile_pic === null)
                            <img src="{{ asset('backend/assets/images/avatars') }}/avatar-1.png"
                                class="shadow rounded-circle" width="120" height="120" alt="">
                        @else
                            <img src="{{ asset('uploads/profile_pics') }}/{{ $user_info->profile_pic }}"
                                class="shadow rounded-circle" width="120" height="120" alt="">
                        @endif

                    </div>
                    <div class="gap-3 mt-5 d-flex align-items-center justify-content-around">
                        <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="mb-0 text-secondary">Posts</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="mb-0 text-secondary">Comments</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h4 class="mb-1">{{ $user_info->name }}</h4>
                        <p class="mb-0 text-secondary">{{ $user_info->role }}</p>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">{{ $user_info->email }}</h6>
                    </div>
                    <hr>
                    <div class="text-start">
                        <h5 class="">About</h5>
                        <p class="mb-0">{{ $user_info->about_me }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end row-->
@endsection
