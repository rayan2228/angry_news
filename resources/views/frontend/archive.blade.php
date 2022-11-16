@extends('frontend.layouts.guest')
@section('content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area breadcrumb-style-1 bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner">
                        <h1 class="page-title">Travel</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Post List Wrapper  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="post-details.html">
                                <img src="{{ asset('frontend') }}/assets/images/post-images/post-list-01.jpg"
                                    alt="Post Images">
                            </a>
                            <a class="video-popup icon-color-secondary size-medium position-top-center"
                                href="post-details.html"><span class="play-icon"></span></a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="LIFESTYLE">LIFESTYLE</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="post-details.html">The 1 tool that helps remote teams
                                    collaborate better</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->

                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="post-details.html">
                                <img src="{{ asset('frontend') }}/assets/images/post-images/post-list-02.jpg"
                                    alt="Post Images">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="TRAVEL">TRAVEL</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="post-details.html">Traditional design won’t save us in the
                                    COVID-19 era</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->

                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="post-details.html">
                                <img src="{{ asset('frontend') }}/assets/images/post-images/post-list-03.jpg"
                                    alt="Post Images">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="FOOD">FOOD</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="post-details.html">Security isn’t just a technology
                                    problem it’s about design, too</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->

                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="post-details.html">
                                <img src="{{ asset('frontend') }}/assets/images/post-images/post-list-04.jpg"
                                    alt="Post Images">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="DESIGN">DESIGN</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="post-details.html">New: Freehand Templates, built for the
                                    whole team</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->

                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="post-details.html">
                                <img src="{{ asset('frontend') }}/assets/images/post-images/post-list-05.jpg"
                                    alt="Post Images">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                        <span class="hover-flip-item">
                                            <span data-text="CREATIVE">CREATIVE</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="post-details.html">Get Ready To Up Your Creative Game With
                                    The New DJI Mavic Air 2</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->

                </div>
                <x-frontend.sidebar_tow />
            </div>
        </div>
    </div>
    <!-- End Post List Wrapper  -->
@endsection
