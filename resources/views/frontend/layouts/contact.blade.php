@extends('frontend.master')
@section('content')

 

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.433381173779!2d90.3731717!3d23.8387398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c102b69a999b%3A0xff8ebcc8eb7dee2a!2sGREENBUD%20WATER!5e0!3m2!1sen!2sbd!4v1662632860036!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Mirpur Dhaka. </h4>
            <ul>
                <li>House 1124-1125, Road 11, Avenue 8A, DOHS Mirpur, Dhaka.</li>
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
                    <p>01711662341</p>
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


@endsection