@extends('frontend.master')
@section('content')
    

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <!-- <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Contact Us</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Map Begin -->
    <div class="map">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7376232832735!2d90.42264936049055!3d23.7923557839411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7bc822af0fb%3A0x2f850365c7070111!2sConfidence%20Center%2C%2001%20Bayzid%20Rd%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1659433254127!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Sahajadpur, Gulshan, Dhaka. </h4>
                <ul>
                    <li>Add: F14A, L 14, Confidence Center (Building 2), Sahajadpur, Gulshan, Dhaka. </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+02 44801158</p>
                        <p>01846888818</p>
                        <p>01673860256</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>
                            House 1124-1125, Road 11, Avenue 8A, DOHS Mirpur, Dhaka.
                            <br>
                            F14A, L 14, Confidence Center (Building 2), Sahajadpur, Gulshan, Dhaka.
                            <br>
                            House 64, Road 04, Block B, Chandgaon R/A, Chattogram.
                        </p>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>water@greenbudbd.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
    @endsection
