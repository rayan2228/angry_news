@extends('backend.layouts.guest')
@section('content')
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="overflow-hidden shadow card rounded-0">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                                <img src="{{ asset('backend') }}/assets/images/error/forgot-password-frent-img.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4 card-body p-sm-5">
                                    <h5 class="card-title">Genrate New Password</h5>
                                    <p class="mb-5 card-text">We received your reset password request. Please enter your new
                                        password!</p>
                                    <form class="form-body" method="POST" action="{{ route('admin.password.update') }}">
                                        @csrf
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputNewPassword" class="form-label">Email</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="px-3 position-absolute top-50 translate-middle-y search-icon">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputNewPassword" placeholder="Enter New Password"
                                                        name="email" value='{{ old('email') }}'>
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNewPassword" class="form-label">New Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="px-3 position-absolute top-50 translate-middle-y search-icon">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputNewPassword" placeholder="Enter New Password"
                                                        name="password">
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputConfirmPassword" class="form-label">Confirm
                                                    Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="px-3 position-absolute top-50 translate-middle-y search-icon">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputConfirmPassword" placeholder="Confirm Password"
                                                        name="password_confirmation">
                                                    @error('password_confirmation')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="gap-3 d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Change
                                                        Password</button>
                                                    <a href="{{ route('admin.login') }}"
                                                        class="btn btn-light radius-30">Back to
                                                        Login</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->
    @endsection
