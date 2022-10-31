@extends('frontend.layouts.guest')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li>
                <li class="breadcrumb-item">News details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Single News Start-->
    <div class="single-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="sn-img">
                        <img src="{{ asset('uploads/post_thumbnail') }}/{{ $post_data['post_thumbnail'] }}" />
                    </div>
                    <div class="sn-content">
                        <a class="sn-title" href="">Lorem ipsum dolor sit amet</a>
                        <a class="sn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                        <div style="overflow-x: hidden">
                            <?php echo $post_data['post_description']  ?>
                        </div>
                      
                        <div class="p-4 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="mr-2 rounded-circle" src="{{ asset('frontend/img') }}/user.jpg"width="25"
                                    height="25" alt="">
                                <span>John Doe</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="mr-2 far fa-eye"></i>12345</span>
                                <span class="ml-3"><i class="mr-2 far fa-comment"></i>123</span>
                            </div>
                        </div>
                        <!-- Comment List Start -->
                        <div class="mt-4 mb-3">
                            <div class="mb-0 section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                            </div>
                            <div class="p-4 bg-white border border-top-0">
                                <div class="mb-4 media">
                                    <img src="{{ asset('frontend/img') }}/user.jpg"alt="Image"
                                        class="mt-1 mr-3 img-fluid" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a>
                                            <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                            ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="{{ asset('frontend/img') }}/user.jpg"alt="Image"
                                        class="mt-1 mr-3 img-fluid" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a>
                                            <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                            ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        <div class="mt-4 media">
                                            <img src="{{ asset('frontend/img') }}/user.jpg" alt="Image"
                                                class="mt-1 mr-3 img-fluid" style="width: 45px;">
                                            <div class="media-body">
                                                <h6><a class="text-secondary font-weight-bold" href="">John Doe</a>
                                                    <small><i>01 Jan 2045</i></small></h6>
                                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                    labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed
                                                    sed
                                                    eirmod ipsum.</p>
                                                <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment List End -->
                        <!-- Comment Form Start -->
                        <div class="mb-3">
                            <div class="mb-0 section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                            </div>
                            <div class="p-4 bg-white border border-top-0">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name </label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email </label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message </label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-0 form-group">
                                        <input type="submit" value="Leave a comment"
                                            class="px-3 py-2 btn btn-primary font-weight-semi-bold">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Comment Form End -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Category</h2>
                            <div class="category">
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">National</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">International</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">Economics</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">Politics</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">Lifestyle</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">Technology</a></li>
                                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                            href="">Trades</a></li>
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
                                        <a href=""><img src="{{ asset('frontend') }}/img/adds-2.jpg"
                                                alt="Image"></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href=""><img src="{{ asset('frontend') }}/img/adds-2.jpg"
                                                alt="Image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->
@endsection
