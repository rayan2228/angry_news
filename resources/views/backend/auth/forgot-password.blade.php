@extends('backend.layouts.guest')
@section('content')
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
                                    <h5 class="card-title">Forgot Password?</h5>
                                    <p class="mb-5 card-text">Enter your registered email ID to reset the password</p>
                                    <form class="form-body" method="POST" action="{{ route('admin.password.email') }}">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailid" class="form-label">Email id</label>
                                                <input type="email" class="form-control form-control-lg radius-30"
                                                    id="inputEmailid" placeholder="Email id" name="email">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="gap-3 d-grid">
                                                    <button type="submit"
                                                        class="btn btn-lg btn-primary radius-30">Send</button>
                                                    <a href="{{ route('admin.login') }}"
                                                        class="btn btn-lg btn-light radius-30">Back to Login</a>
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
