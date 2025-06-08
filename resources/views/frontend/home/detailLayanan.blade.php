@extends('frontend.layouts.default')
@section('title', __( 'Profil Dokter' ))
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Treatment</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Detail Treatment</li>
            </ul> 
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Doctor Detail Section -->
<section class="doctor-detail-section">
    <div class="auto-container">
        <div class="row">
            <!-- Content Side -->
            <div class="content-side col-lg-8 col-md-12 col-sm-12 order-2">
                <div class="docter-detail">
                    <h3 class="name">{{ $layanan->layanan }}</h3>
                    <div class="text">{!! $layanan->deskripsi !!}</div> 
                </div>
            </div>

            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar"> 
                    <!-- Team Block -->
                    <div class="team-block wow fadeInUp">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('uploads/layanan/'.$layanan->gambar) }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Doctor Detail Section -->

@endsection