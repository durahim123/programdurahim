@extends('frontend.layouts.default')
@section('title', __( 'Profil Dokter' ))
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Doctor</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Detail Doctors</li>
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
                    <h3 class="name">Dr. {{ $dokter->nama_dokter }}</h3>
                    <div class="text">{!! $dokter->profil_dokter !!}</div> 
                    <ul class="doctor-info-list">
                        <li>
                            <strong>Speciality</strong>
                            <p>{{ $dokter->spesialis }}</p>
                        </li>
                    </ul>
                </div>

                <div class="appointment-form default-form">
                    <div class="sec-title">
                        <h4>Jadwal Praktek</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <!--=======  single icon service  =======-->

                                <div class="single-icon-service">
                                    <div class="single-icon-service__icon">
                                        <i class="vc_li vc_li-calendar"></i>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Hari</th>
                                                <th>Jam Praktek </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($jadwalDokter as $namaDokter => $jadwal)
                                            @foreach ($jadwal as $hari => $jam)
                                            <tr>
                                                <td>{{ $hari }}</td>
                                                <td>{{ $jam }}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!--=======  End of single icon service  =======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar"> 
                    <!-- Team Block -->
                    <div class="team-block wow fadeInUp">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('uploads/profil/'.$dokter->gambar) }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Doctor Detail Section -->

@endsection