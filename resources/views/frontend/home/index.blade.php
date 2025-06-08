@extends('frontend.layouts.default')
@section('title', __( 'Home' ))
@section('content')

<!-- Bnner Section One -->
<section class="banner-section-one">
    <div class="banner-carousel owl-carousel owl-theme default-arrows dark">
        <!-- Slide Item -->
        <div class="slide-item" style="background-image: url({{ asset('medicoz') }}/images/main-slider/1.jpg);">
            <div class="auto-container">
                <div class="content-outer">
                    <div class="content-box">
                        <span class="title">Welcome to our Medical Care Center</span>
                        <h2>We take care our <br>patients health</h2>
                        <div class="text">I realized that becoming a doctor, I can only help a small community. <br>But by becoming a doctor, I can help my whole country. </div>
                        <div class="btn-box">
                            <a href="{{ URL::to('tentang-kami') }}" class="theme-btn btn-style-one"><span class="btn-title">About Us</span></a>
                            <a href="{{ URL::to('data-reservasi') }}" class="theme-btn btn-style-two"><span class="btn-title">Our Services</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item" style="background-image: url({{ asset('medicoz') }}/images/main-slider/2.jpg);">
            <div class="auto-container">
                <div class="content-outer">
                    <div class="content-box">
                        <span class="title">Welcome to our Medical Care Center</span>
                        <h2>We take care our <br>patients health</h2>
                        <div class="text">I realized that becoming a doctor, I can only help a small community. <br>But by becoming a doctor, I can help my whole country. </div>
                        <div class="btn-box">
                            <a href="{{ URL::to('tentang-kami') }}" class="theme-btn btn-style-one"><span class="btn-title">About Us</span></a>
                            <a href="{{ URL::to('data-reservasi') }}" class="theme-btn btn-style-two"><span class="btn-title">Our Services</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Bnner Section One -->

<!-- Top Features -->
<section class="top-features">
    <div class="auto-container">
        <div class="row">
            <!-- Feature Block -->
            <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-charity"></span>
                    <h4><a href="#">Quality & Safety</a></h4>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-lifeline"></span>
                    <h4><a href="#">Leading Technology</a></h4>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>
            </div>

            <!-- Feature Block -->
            <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <span class="icon flaticon-doctor"></span>
                    <h4><a href="#">Experts by Experience</a></h4>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Section -->


<!-- Team Section -->
<section class="team-section" style="padding:0 !important">
    <div class="auto-container">
        <div class="sec-title text-center">
        <h2>Pelayanan Threatment Terbaik</h2>
            <span class="sub-title">Kami selalu bangga jika kami bisa memberikan pelayanan terbaik untuk anda. <br> Rasakan threatment terbaik yang ada diklinik kami</span>
        </div>

        <div class="row">
            @foreach ($layanan as $valLayanan)
            <!-- Layanan -->
            <div class="team-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <figure class="image"><img src="{{ asset('uploads/layanan/'.$valLayanan->gambar) }}" alt=""></figure>
                    <ul class="social-links">
                        <li><a href="{{ URL::to('detail-data-layanan/'.$valLayanan->id) }}"><span class="fa fa-eye"></span></a></li>
                    </ul>
                    <div class="info-box">
                        <h4 class="name"><a href="{{ URL::to('detail-data-layanan/'.$valLayanan->id) }}">{{ $valLayanan->layanan }}</a></h4>
                        <span class="designation">Rp {{ number_format($valLayanan->harga) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team Section -->
<div class="sidebar-page-container" style="padding:0 !important">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Produk Kecantikan Terbaik Kami</h2>
            <span class="sub-title">Kami menyediakan berbagai produk dengan kualitas terbaik, <br> rasakan manfaat setiap produk dari kami.</span>
        </div>
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="our-shop">
                    <div class="row">
                        <!-- Shop Item --> 
                        @foreach ($product as $valProduct)
                        <div class="shop-item col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ URL::to('detail-data-produk/'.$valProduct->id) }}">
                                            <img src="{{ asset('uploads/produk/'.$valProduct->gambar) }}" alt="">
                                        </a>
                                    </figure>
                                    <span class="onsale">Sale</span>
                                </div>
                                <div class="lower-content">
                                    <p><a href="{{ URL::to('detail-data-produk/'.$valProduct->id) }}" style="color: black;"><strong>{{ $valProduct->nama_produk }}</strong></a></p>
                                    <div class="price">Rp {{ number_format($valProduct->harga) }}</div>
                                    <a href="{{ URL::to('detail-data-produk/'.$valProduct->id) }}" class="theme-btn add-to-cart">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!--Styled Pagination-->
                    <ul class="styled-pagination">
                        <li><a href="#" class="arrow"><span class="flaticon-left"></span></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="arrow"><span class="flaticon-right"></span></a></li>
                    </ul>                
                    <!--End Styled Pagination-->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection