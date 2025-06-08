@extends('frontend.layouts.default')
@section('title', __( 'Tentang Kami' ))
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">            
            <h1>Testimoni</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Testimoni</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- About Section -->
<section class="content-elements bg_alice">
    <div class="auto-container">
        <div class="sec-title">
            <h2>Testimoni</h2>
        </div>  
        <section class="testimonial-section-two alternate">
            <div class="testimonial-outer">
                <!-- Product Thumbs Carousel -->
                <div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme">
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('medicoz') }}/images/resource/testi-thumb-1.jpg" alt=""></figure>
                            <div class="author-info">
                                <span class="icon fa fa-quote-left"></span>
                                <div class="author-name">Lara Croft</div>
                                <div class="designation">Restaurant Owner</div>
                            </div>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('medicoz') }}/images/resource/testi-thumb-2.jpg" alt=""></figure>
                            <div class="author-info">
                                <span class="icon fa fa-quote-left"></span>
                                <div class="author-name">Lara Croft</div>
                                <div class="designation">Restaurant Owner</div>
                            </div>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('medicoz') }}/images/resource/testi-thumb-3.jpg" alt=""></figure>
                            <div class="author-info">
                                <span class="icon fa fa-quote-left"></span>
                                <div class="author-name">Lara Croft</div>
                                <div class="designation">Restaurant Owner</div>
                            </div>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('medicoz') }}/images/resource/testi-thumb-2.jpg" alt=""></figure>
                            <div class="author-info">
                                <span class="icon fa fa-quote-left"></span>
                                <div class="author-name">Lara Croft</div>
                                <div class="designation">Restaurant Owner</div>
                            </div>
                        </div>
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="{{ asset('medicoz') }}/images/resource/testi-thumb-3.jpg" alt=""></figure>
                            <div class="author-info">
                                <span class="icon fa fa-quote-left"></span>
                                <div class="author-name">Lara Croft</div>
                                <div class="designation">Restaurant Owner</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Testimonial Carousel -->
                <div class="client-testimonial-carousel default-dots owl-carousel owl-theme">
                
                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
                        </div>
                    </div>

                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
                        </div>
                    </div>
                    
                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!--End Testimonial -->
    </div>
</section>
<!-- End About Section -->

@endsection