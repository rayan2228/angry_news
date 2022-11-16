<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Default || Blogar - Personal Blog Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/base.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Start Header -->
        <header class="header axil-header header-light header-sticky">
            <div class="header-wrap">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                        <div class="logo">
                            <a href="index.html">
                                <img class="dark-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-black.png" alt="Blogar logo">
                                <img class="light-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-white2.png" alt="Blogar logo">
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="mainmenu-wrapper">
                            <nav class="mainmenu-nav">
                                <!-- Start Mainmanu Nav -->
                                <ul class="mainmenu">
                                    <li class="menu-item-has-children"><a href="{{ route('index') }}">Home</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="">Posts</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="{{ route('authors') }}">Writers</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                                <!-- End Mainmanu Nav -->
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                        <div class="header-search d-flex align-items-center text-end">
                            <form class="header-search-form d-sm-block d-none">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                            <div class="mobile-search-wrapper d-sm-none d-block">
                                <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                                <form class="header-search-form">
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button"><i
                                                class="fal fa-search"></i></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <ul class="metabar-block">
                                <li class="icon"><a href="#"><i class="fas fa-bookmark"></i></a></li>
                                <li class="icon"><a href="#"><i class="fas fa-bell"></i></a></li>
                                <li><a href="#"><img src="{{ asset('frontend') }}/assets/images/others/author.png"
                                            alt="Author Images"></a></li>
                            </ul>
                            <!-- Start Hamburger Menu  -->
                            <div class="hamburger-menu d-block d-xl-none">
                                <div class="hamburger-inner">
                                    <div class="icon"><i class="fal fa-bars"></i></div>
                                </div>
                            </div>
                            <!-- End Hamburger Menu  -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Start Header -->

        <!-- Start Mobile Menu Area  -->
        <div class="popup-mobilemenu-area">
            <div class="inner">
                <div class="mobile-menu-top">
                    <div class="logo">
                        <a href="index.html">
                            <img class="dark-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-black.png" alt="Logo Images">
                            <img class="light-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-white2.png" alt="Logo Images">
                        </a>
                    </div>
                    <div class="mobile-close">
                        <div class="icon">
                            <i class="fal fa-times"></i>
                        </div>
                    </div>
                </div>
                <ul class="mainmenu">
                    <li class="menu-item-has-children"><a href="index.html">Home</a>
                    </li>
                    <li class="menu-item-has-children"><a href="post-details.html">Posts</a>
                    </li>
                    <li class="menu-item-has-children"><a href="author.html">Writers</a>
                    </li>
                    <li class="menu-item-has-children"><a href="about.html">About</a>
                    </li>
                    <li class="menu-item-has-children"><a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Mobile Menu Area  -->        
        <!-- Start content Area  -->
        @yield('content')
        <!-- End content Area  -->
        <!-- Start Instagram Area  -->
        <div class="axil-instagram-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Instagram</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-lg-12">
                        <ul class="instagram-post-list">
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-01.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-02.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-03.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-04.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-05.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/images/small-images/instagram-md-06.jpg" alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Instagram Area  -->

        <!-- Start Footer Area  -->
        <div class="axil-footer-area axil-footer-style-1 footer-variation-2">
            <div class="footer-mainmenu">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">World</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">U.N.</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Politics</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Executive</a></li>
                                        <li><a href="#">Senate</a></li>
                                        <li><a href="#">House</a></li>
                                        <li><a href="#">Judiciary</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Foreign policy</a></li>
                                        <li><a href="#">Polls</a></li>
                                        <li><a href="#">Elections</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Entertainment</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Celebrity News</a></li>
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">TV News</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Music News</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Style News</a></li>
                                        <li><a href="#">Entertainment Video</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Business</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Health</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">About</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">U.N.</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Footer Top Area  -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="logo">
                                <a href="index.html">
                                    <img class="dark-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-black.png" alt="Logo Images">
                                    <img class="white-logo" src="{{ asset('frontend') }}/assets/images/logo/logo-white2.png"
                                        alt="Logo Images">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8">
                            <!-- Start Post List  -->
                            <div
                                class="flex-wrap d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center">
                                <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                                <ul class="social-icon color-tertiary md-size justify-content-start">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Post List  -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Footer Top Area  -->

            <!-- Start Copyright Area  -->
            <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-md-8">
                            <div class="copyright-left">
                                <ul class="mainmenu justify-content-start">
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Contact Us">Contact Us</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Terms of Use">Terms of Use</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="AdChoices">AdChoices</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Advertise with Us">Advertise with Us</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Blogar Store">Blogar Store</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="copyright-right text-md-end mt_sm--20 text-start">
                                <p class="b3">All Rights Reserved © 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area  -->
        </div>
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/tweenmax.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/js.cookie.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.style.switcher.js"></script>


    <!-- Main JS -->
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

</body>

</html>
