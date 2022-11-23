@extends('frontend.layouts.guest')
@section('content')
    <style>
        /*login*/
        .login {
            margin-top: 100px;
            padding: 100px;
        }

        .login-content {
            border: 1px solid #E6E7E7;
            padding: 30px;
        }

        .login-content h4 {
            margin-bottom: 20px;
        }

        .login-content .form-control {
            background-color: #ffffff;
            border: 1px solid #E6E7E7;
            border-radius: 0px;
            padding: 25px 20px;
            font-size: 16px;
            color: #191B1D;
            display: inline-block;
            cursor: pointer;
            margin-bottom: 5px;
            -webkit-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .login-content .btn-link {
            color: #191B1D;
            margin-left: auto;
        }

        .login-content .btn-custom {
            width: 100%;
            text-align: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin: 10px 0px 10px 0px;
            padding: 15px 0px;
            color: #3858f6;
        }

        .login-content .sign-controls {
            margin-top: 20px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .login-content p {
            margin-bottom: 0px;
        }

        .login-content .btn-link {
            color: #3858f6;
        }
        .login-content .custom-control-label{
            color: #3858f6;
        }
    </style>

    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="m-auto col-lg-6 col-md-8">
                    <div class="login-content">
                        <h4>Login</h4>
                        @if (session('status'))
                        <h5 class="text-danger">{{ session('status') }}</h5>
                        @endif
                        <form action="{{ route('login') }}" class="sign-form widget-form " method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="test-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                @error('password')
                                    <p class="test-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sign-controls form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                    <label class="custom-control-label" for="remember_me">Remember Me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="btn-link ">Forgot Password?</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-custom">Login in</button>
                            </div>
                            <p class="text-center form-group">Don't have an account? <a href="{{ route('register') }}"
                                    class="btn-link">Create One</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
