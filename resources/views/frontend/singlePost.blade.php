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
                        <img src="{{ asset('frontend') }}/img/top-news-1.jpg" />
                    </div>
                    <div class="sn-content">
                        <a class="sn-title" href="">Lorem ipsum dolor sit amet</a>
                        <a class="sn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique dictum tincidunt.
                            Nam rhoncus sem vitae orci blandit, quis fermentum justo laoreet. Fusce vestibulum orci vitae
                            luctus tincidunt. Maecenas eros elit, scelerisque at justo eget, consectetur semper turpis.
                            Proin pulvinar lorem eu sapien fermentum, sed finibus augue convallis. Aliquam ultrices porta
                            gravida. Vestibulum nec libero sit amet enim consequat facilisis. Orci varius natoque penatibus
                            et magnis dis parturient montes, nascetur ridiculus mus. Cras facilisis massa eget suscipit
                            venenatis. Suspendisse et molestie diam. Vestibulum in massa dapibus, blandit nibh ut, feugiat
                            leo.
                        </p>
                        <p>
                            Nulla consectetur risus libero. Donec mattis tortor justo, ac egestas purus condimentum in.
                            Etiam viverra nec metus quis egestas. Nulla commodo, lectus nec dictum malesuada, tortor tellus
                            consequat nisi, sit amet dictum erat tellus in libero. In dignissim lectus quis elit posuere,
                            sit amet tempor nisi iaculis. Curabitur eget ante in libero laoreet finibus nec et libero. In
                            hac habitasse platea dictumst. Morbi tincidunt ex non odio auctor tristique. Nulla facilisi.
                            Maecenas ullamcorper, felis eget interdum semper, mi ipsum auctor magna, ut ullamcorper leo
                            metus vitae ex. Curabitur eu tempor elit. Phasellus blandit elit fringilla, ultricies ligula
                            sed, pretium ligula. Duis condimentum elementum orci, pulvinar mattis elit luctus at. Vestibulum
                            lacinia porttitor urna, eget aliquet justo porta sed. Cras pulvinar euismod consectetur.
                            Vestibulum quis nisi non erat feugiat viverra.
                        </p>
                        <p>
                            Aliquam eleifend pharetra nunc, et finibus felis tristique nec. Ut mattis nisi ante, vel varius
                            ipsum consectetur sit amet. Donec sed eros at magna sollicitudin molestie. Cras quis malesuada
                            felis. Maecenas sodales nunc sit amet lobortis iaculis. Etiam eget consectetur sem, et aliquet
                            justo. Curabitur at viverra lacus, eget feugiat erat. Fusce lacinia faucibus diam ut vestibulum.
                            Vestibulum nisi sem, lacinia ullamcorper iaculis a, finibus eget mauris. Vestibulum elementum
                            quam quam, sit amet condimentum odio luctus at. Aenean dictum nec nisi vitae hendrerit. Nulla
                            facilisi.
                        </p>
                        <div class="d-flex justify-content-between p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('frontend/img') }}/user.jpg"width="25"
                                    height="25" alt="">
                                <span>John Doe</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>12345</span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                            </div>
                        </div>
                        <!-- Comment List Start -->
                        <div class="mb-3 mt-4">
                            <div class="section-title mb-0">
                                <h4 class="text-uppercase font-weight-bold m-0">3 Comments</h4>
                            </div>
                            <div class="border-top-0 border bg-white p-4">
                                <div class="media mb-4">
                                    <img src="{{ asset('frontend/img') }}/user.jpg"alt="Image"
                                        class="img-fluid mr-3 mt-1" style="width: 45px;">
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
                                        class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a>
                                            <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                            ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        <div class="media mt-4">
                                            <img src="{{ asset('frontend/img') }}/user.jpg" alt="Image"
                                                class="img-fluid mr-3 mt-1" style="width: 45px;">
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
                            <div class="section-title mb-0">
                                <h4 class="text-uppercase font-weight-bold m-0">Leave a comment</h4>
                            </div>
                            <div class="border-top-0 border bg-white p-4">
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
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave a comment"
                                            class="btn btn-primary font-weight-semi-bold py-2 px-3">
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
