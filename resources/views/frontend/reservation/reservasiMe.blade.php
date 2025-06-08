@extends('frontend.layouts.default')
@section('title', __( 'Jadwal Dokter' ))
@section('content')

<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Reservasi</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Reservasi Saya</li>
            </ul> 
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Team Section Two -->
<section class="team-section-two alternate alternate2">
    <div class="auto-container">
        <h4 style="text-align: -webkit-center; margin-bottom: 15px;">Reservasi Anda</h4>
        <div class="row">
            <table class="table table-bordered">
                <thead style="background:#e2e2e2;">
                    <tr>
                        <th>Tanggal Booing</th>
                        <th>Jam Booing</th>
                        <th>Dokter</th>
                        <th>Layanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                    <tr>
                        <td>{{ tgl_indo($value->tgl_booking) }}</td>
                        <td>{{ $value->jam_booking }}</td>
                        <td>Dr {{ $value->nama_dokter }}</td>
                        <td>
                            @if (count($value->layanan) === 2)
                                {{ implode(' dan ', $value->layanan) }}
                            @elseif (count($value->layanan) > 2)
                                {{ implode(', ', array_slice($value->layanan, 0, -1)) }} dan {{ end($value->layanan) }}
                            @else
                                {{ $layanan[0] ?? 'Tidak ada data layanan' }}
                            @endif
                        </td>
                        <td>
                            @if($value->status == 0)
                                Mengunggu Approve
                            @elseif($value->status == 1)
                                Approved
                            @else
                                Selesai
                            @endif
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--End Team Section -->

@endsection