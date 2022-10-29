@extends('frontend.layouts.guest')
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">News</a></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
    <!-- category start -->
    <div class="cat-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h2><i class="fas fa-align-justify"></i>Entertainment</h2>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ asset('frontend') }}/img/cat-news-10.jpg" />
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                        <a class="cn-title" href="">Ut laoreet justo non ornare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ asset('frontend') }}/img/cat-news-11.jpg" />
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                        <a class="cn-title" href="">Proin a nulla ut enim feugiat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ asset('frontend') }}/img/cat-news-12.jpg" />
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                        <a class="cn-title" href="">Sed mauris sem sollicitudin at neque</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ asset('frontend') }}/img/cat-news-11.jpg" />
                                <div class="cn-content">
                                    <div class="cn-content-inner">
                                        <a class="cn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                        <a class="cn-title" href="">Proin a nulla ut enim feugiat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Category</h2>
                            <div class="category">
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">National</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">International</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Economics</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Politics</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Lifestyle</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Technology</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Trades</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Tags</h2>
                            <div class="tags">
                                <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a>
                                <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Ads 1 column</h2>
                            <div class="image">
                                <a href=""><img src="{{ asset('frontend') }}/img/adds-1.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Ads 2 column</h2>
                            <div class="image">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href=""><img src="{{ asset('frontend') }}/img/adds-2.jpg" alt="Image"></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href=""><img src="{{ asset('frontend') }}/img/adds-2.jpg" alt="Image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- category End -->
@endsection