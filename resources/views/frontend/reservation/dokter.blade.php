@extends('frontend.layouts.default')
@section('title', __( 'Jadwal Dokter' ))
@section('content')

<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Doctors</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Doctors</li>
            </ul> 
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Team Section Two -->
<section class="team-section-two alternate alternate2">
    <div class="auto-container">
        <h4 style="text-align: -webkit-center; margin-bottom: 15px;">Dokter Kami</h4>
        <div class="row">
            
            <!-- Team Block -->
            @foreach ($dokter as $key => $valDokter)
            <div class="team-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                       <figure class="image">
                            <a href="{{ URL::to('profil-dokter/'.$valDokter->id) }}">
                                <img src="{{ asset('uploads/profil/'.$valDokter->gambar) }}" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="info-box">
                        <h5 class="name"><a href="{{ URL::to('profil-dokter/'.$valDokter->id) }}">{{ $valDokter->nama_dokter }}</a></h5>
                        <p>{{ $valDokter->spesialis }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End Team Section -->

<!-- Time Table Section -->
<section class="time-table-section">
    <div class="auto-container">
        <div class="table-outer">
            <h4 style="text-align: -webkit-center;margin-bottom:20px">Jadwal Prakter Dokter</h4>
            <div class="row">
            <!-- Doctors Time Table -->
                @php 
                $hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
                @endphp
                @foreach ($hari as $value)
                <div class="col-md-4">
                    <!--=======  single icon service  =======-->

                    <div class="single-icon-service">
                        <div class="single-icon-service__icon">
                            <i class="vc_li vc_li-calendar"></i>
                        </div>

                        <h3 class="single-icon-service__title">{{ $value }}</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Dokter</th>
                                    <th>Jam Praktek </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $found = false; @endphp
                            @foreach ($jadwalDokter as $namaDokter => $jadwal)
                                @if (isset($jadwal[$value]))
                                    <tr>
                                        <td>{{ $namaDokter }}</td>
                                        <td>{{ $jadwal[$value] }}</td>
                                    </tr>
                                    @php $found = true; @endphp
                                @endif
                            @endforeach

                            @if (!$found)
                                <tr>
                                    <td colspan="2">Tidak ada jadwal</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of single icon service  =======-->
                </div>
                @endforeach
            </div>
        </div>
    </div>      
</section>
<!-- End Time Table Section -->
@endsection