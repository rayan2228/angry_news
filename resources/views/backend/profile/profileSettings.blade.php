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

    <div class="profile-cover bg-dark"
        style="background: url({{ asset('uploads/cover_pics') }}/{{ auth()->guard('admin')->user()->cover_pic }});background-size:cover;">
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="border-0 shadow-sm card">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <form class="row g-3"
                        action='{{ route('admin.profile.update', ['profile_id' => auth()->guard('admin')->id()]) }}'
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="border shadow-none card">
                            <div class="card-header">
                                <h6 class="mb-0">USER INFORMATION</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ auth()->guard('admin')->user()->name }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Email address</label>
                                        <input type="text" class="form-control"
                                            {{ auth()->guard('admin')->user()->email? 'readonly': '' }}
                                            value="{{ auth()->guard('admin')->user()->email }}">
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-6">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" name="profile_pic">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Cover Photo</label>
                                        <input type="file" class="form-control" name="cover_pic">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="border shadow-none card">
                            <div class="card-header">
                                <h6 class="mb-0">CONTACT INFORMATION</h6>
                            </div>
                            <div class="card-body">
                                <div class="mt-2 row">
                                    <div class="col-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ auth()->guard('admin')->user()->address }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number"
                                            value="{{ auth()->guard('admin')->user()->phone_number }}">


                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-6">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city"
                                            value="{{ auth()->guard('admin')->user()->city }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country"
                                            value="{{ auth()->guard('admin')->user()->country }}">
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-12">
                                        <label class="form-label">About Me</label>
                                        <textarea class="form-control" name="about_me" rows="4" cols="4" placeholder="Describe yourself...">{{ auth()->guard('admin')->user()->about_me }}</textarea>
                                        @error('about_me')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="px-4 btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="overflow-hidden border-0 shadow-sm card">
                <div class="card-body">
                    <div class="text-center profile-avatar">
                        @if (auth()->guard('admin')->user()->profile_pic === null)
                            <img src="{{ asset('backend/assets/images/avatars') }}/avatar-1.png"
                                class="shadow rounded-circle" width="120" height="120" alt="">
                        @else
                            <img src="{{ asset('uploads/profile_pics') }}/{{ auth()->guard('admin')->user()->profile_pic }}"
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
                        <h4 class="mb-1">{{ auth()->guard('admin')->user()->name }}</h4>
                        <p class="mb-0 text-secondary">{{ auth()->guard('admin')->user()->role }}</p>
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
    <div class="row">
        <div class="col-12">
            <form class="row g-3"
                action='{{ route('admin.profile.updatepassowrd', ['profile_id' => auth()->guard('admin')->id()]) }}'
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="border shadow-none card">
                    <div class="card-header">
                        <h6 class="mb-0">Change Your Passowrd</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 row">
                            <div class="col-12">
                                <label class="form-label">Cureent Password</label>
                                <input type="password" class="form-control" name="current_password">
                                @if (session('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="col-12">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password">
                                @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="col-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 text-start">
                            <button type="submit" class="px-4 btn btn-primary">Change Passowrd</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!--end row-->
@section('footer_script')
    @if (session('update'))
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
        @elseif (session('success'))
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
    @endif
@endsection
@endsection
