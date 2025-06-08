@extends('frontend.layouts.default')
@section('title', __( 'Tentang Kami' ))
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">            
            <h1>Tentang Kami</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Tentang Kami</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

    <!-- About Section -->
<section class="about-section">
    <div class="auto-container">
        <div class="row">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>TENTANG KAMI</h2>
                        <p>Setiap pelayanan yang kami berikan adalah pelayanan terbaik. Kepuasan dari para customer menjadi prioritas kami. Kami berikan pelayanan terbaik sehingga anda dapat merasakan manfaat untuk anda.</p>
                        <p> Setiap pelayanan yang kami berikan adalah pelayanan terbaik. Kepuasan dari para customer menjadi prioritas kami. Kami berikan pelayanan terbaik sehingga anda dapat merasakan manfaat untuk anda</p>

                        <p>Setiap pelayanan yang kami berikan adalah pelayanan terbaik. Kepuasan dari para customer menjadi prioritas kami. Kami berikan pelayanan terbaik sehingga anda dapat merasakan manfaat untuk anda</p>
                    </div>
                    <div class="link-box">
                        <figure class="signature"><img src="{{ asset('medicoz') }}/images/resource/signature.png" alt=""></figure>
                    </div>
                </div>
            </div>

            <!-- Images Column -->
            <div class="images-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <figure class="image-1"><img src="{{ asset('medicoz') }}/images/resource/image-1.png" alt=""></figure>
                    <figure class="image-2"><img src="{{ asset('medicoz') }}/images/resource/image-2.png" alt=""></figure>
                    <figure class="image-3">
                        <span class="hex"></span>
                        <img src="{{ asset('medicoz') }}/images/resource/image-3.png" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

@endsection