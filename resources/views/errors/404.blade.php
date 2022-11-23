@extends('frontend.layouts.guest')
@section('content')
            <!-- Start Error Area  -->
        <div class="error-area bg_image--4 bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner">
                            <img src="{{ asset('frontend') }}/assets/images/others/404.png" alt="Error Images">
                            <h1 class="title">Page not found!</h1>
                            <p>Sorry, but the page you were looking for could not be found.</p>
                            <div class="back-totop-button cerchio d-inline-block">
                                <a class="axil-button button-rounded hover-flip-item-wrapper" href="{{ route('index') }}">
                                    <span class="hover-flip-item">
                                        <span data-text="Back to Homepage">Back to Homepage</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Error Area  -->
@endsection
