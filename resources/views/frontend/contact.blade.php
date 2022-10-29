@extends('frontend.layouts.guest')
@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="form">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div><button class="btn" type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.985767636229!2d-73.52689268518203!3d40.78432704112558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c281127307115f%3A0x90d5abaf2f0279de!2sTerry%20Ln%2C%20Jericho%2C%20NY%2011753%2C%20USA!5e0!3m2!1sen!2sbd!4v1580837516748!5m2!1sen!2sbd"
                            frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                        </p>
                        <h4><i class="fa fa-map-marker"></i>123 Terry Lane, New York, USA</h4>
                        <h4><i class="fa fa-envelope"></i>email@example.com</h4>
                        <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-linkedin"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
