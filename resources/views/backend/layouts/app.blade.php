<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend') }}/assets/images/favicon-32x32.png" type="image/png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--plugins-->
    <link href="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ec8600f611.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/bootstrap-extended.css" rel="stylesheet" />

    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- select js --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- <link href="{{ asset('backend') }}/assets/css/style.css" rel="stylesheet" /> --}}
    @vite(['public/backend/assets/css/style.css'])
    <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('backend') }}/assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('backend') }}/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/light-theme.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/header-colors.css" rel="stylesheet" />

    <title>News 24 - Dashboard</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3">
                    <i class="bi bi-list"></i>
                </div>
                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Type here to search">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon"><i
                            class="bi bi-x-lg"></i></div>
                </form>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item search-toggle-icon">
                            <a class="nav-link" href="#">
                                <div class="">
                                    <i class="bi bi-search"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center">
                                    <img src="{{ asset('backend') }}/assets/images/avatars/avatar-1.png"
                                        class="user-img" alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-1.png"
                                                alt="" class="rounded-circle" width="54" height="54">
                                            <div class="ms-3">
                                                <h6 class="dropdown-user-name mb-0">
                                                    {{ auth()->guard('admin')->user()->name }}</h6>
                                                <small
                                                    class="dropdown-user-designation text-secondary mb-0">{{ auth()->guard('admin')->user()->role }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-person-fill"></i></div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-gear-fill"></i></div>
                                            <div class="ms-3"><span>Setting</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-lock-fill"></i></div>
                                            <div class="ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="messages">
                                    <span class="notify-badge">5</span>
                                    <i class="bi bi-chat-right-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="border-bottom m-2 p-2">
                                    <h5 class="h5 mb-0">Messages</h5>
                                </div>
                                <div class="header-message-list p-2">
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-1.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-2.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-3.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-4.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Peter Costanzo <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">It
                                                    was popularised in the 1960</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-5.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Thomas Wheeler <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">If
                                                    you are going to use a passage</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-6.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Johnny Seitz <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">All
                                                    the Lorem Ipsum generators</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-1.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-2.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend') }}/assets/images/avatars/avatar-3.png"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">View All Messages</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="notifications">
                                    <span class="notify-badge">8</span>
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="border-bottom m-2 p-2">
                                    <h5 class="h5 mb-0">Notifications</h5>
                                </div>
                                <div class="header-notifications-list p-2">
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-primary text-primary"><i
                                                    class="bi bi-basket2-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">New Orders <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">You
                                                    have recived new orders</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-purple text-purple"><i
                                                    class="bi bi-people-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">New Customers <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">5
                                                    new user registered</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-success text-success"><i
                                                    class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">24 PDF File <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">The
                                                    pdf files generated</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-orange text-orange"><i
                                                    class="bi bi-collection-play-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Time Response <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">5.1
                                                    min avarage time response</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-info text-info"><i
                                                    class="bi bi-cursor-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">New Product Approved <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Your
                                                    new product has approved</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-pink text-pink"><i
                                                    class="bi bi-gift-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">New Comments <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">New
                                                    customer comments recived</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-warning text-warning"><i
                                                    class="bi bi-droplet-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">New 24 authors<span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">24
                                                    new authors joined last week</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-primary text-primary"><i
                                                    class="bi bi-mic-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Your item is shipped <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Successfully
                                                    shipped your item</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-success text-success"><i
                                                    class="bi bi-lightbulb-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">Defense Alerts <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">45%
                                                    less alerts last 4 weeks</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-info text-info"><i
                                                    class="bi bi-bookmark-heart-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">4 New Sign Up <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">New
                                                    4 user registartions</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-bronze text-bronze"><i
                                                    class="bi bi-briefcase-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="dropdown-msg-user mb-0">All Documents Uploaded <span
                                                        class="msg-time float-end text-secondary">1 mo</span></h6>
                                                <small
                                                    class="dropdown-msg-text text-secondary d-flex align-items-center mb-0">Sussessfully
                                                    uploaded all files</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">View All Notifications</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('backend') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">News 24 </h4>
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-house-fill"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.dashboard') }}"><i class="bi bi-circle"></i>Home</a>
                        </li>
                        <li> <a href="index.html"><i class="bi bi-circle"></i>Profile</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Category</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                        </div>
                        <div class="menu-title">Category</div>

                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.category.create') }}"><i class="bi bi-circle"></i>All
                                Categories</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Post</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                        </div>
                        <div class="menu-title">Post</div>

                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.post.create') }}"><i class="bi bi-circle"></i>Create Post</a>
                        </li>
                    </ul>
                    <ul>
                        <li> <a href="{{ route('admin.post.index') }}"><i class="bi bi-circle"></i>Post List</a>
                        </li>
                    </ul>
                    <ul>
                        <li> <a href="{{ route('admin.tags.create') }}"><i class="bi bi-circle"></i>Add Tags</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
        <!--start content-->
        <main class="page-content">
            @yield('content')
        </main>
        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        {{-- <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end border-start-0 p-2 shadow" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1" checked>
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3">
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                            value="option3">
                        <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end switcher--> --}}

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pace.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <!--app-->
    <script src="{{ asset('backend') }}/assets/js/app.js"></script>
    <script src="{{ asset('backend') }}/assets/js/index.js"></script>
    <script>
        new PerfectScrollbar(".best-product")
    </script>
    {{-- select js  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                placeholder: 'describe your post',
                height: 400,
            });
              $('.select_js').select2();
        });
    </script>
    @yield('footer_script')

</body>

</html>