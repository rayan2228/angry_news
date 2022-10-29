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
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ asset('backend') }}/assets/images/error/login-img.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4 card-body p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="mb-5 card-text">See your growth and get consulting support!</p>
                                    <form class="form-body" method="POST" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="d-grid">
                                            <a class="btn btn-white radius-30" href="javascript:;"><span
                                                    class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2"
                                                        src="{{ asset('backend') }}/assets/images/icons/search.svg"
                                                        width="16" alt="">
                                                    <span>Sign in with Google</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="mb-4 text-center login-separater"> <span>OR SIGN IN WITH EMAIL</span>
                                            <hr>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="px-3 position-absolute top-50 translate-middle-y search-icon">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <p class="text-danger"> {{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="px-3 position-absolute top-50 translate-middle-y search-icon">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputChoosePassword" placeholder="Enter Password"
                                                        name="password">
                                                    @error('password')
                                                        <p class="text-danger"> {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label" for="remember_me">Remember
                                                        Me</label>
                                                    <input class="form-check-input" type="checkbox" id="remember_me"
                                                        checked="" name="remember">
                                                </div>
                                            </div>
                                            

                                            @if (Route::has('admin.password.request'))
                                                <div class="col-6 text-end"> <a
                                                        href="{{ route('admin.password.request') }}">Forgot Password ?</a>
                                                </div>
                                            @endif
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign
                                                        In</button>
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

    </div>
    <!--end wrapper-->
@endsection
