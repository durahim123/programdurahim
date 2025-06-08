@extends('layouts.default')
@section('title', __( 'Booking' ))
@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">

                        @include('layouts.partials.notification')
                    </div>
                </div>
                <div class="card card-bordered card-preview" style="padding:30px;">
                    <h4 class="nk-block-title" style="font-weight: bold;">List Booking 
                        <span><a href="{{ URL::to('/add-booking') }}" class="btn btn-primary" style="float: right;">Tambah Data</a></span>
                        <span><a href="{{ URL::to('/laporan') }}" class="btn btn-primary" style="float: right;margin-right:10px;">Kirim Laporan</a></span>
                    </h4>
                    <div class="card-inner">
                        
                        
                        
                        <table class="datatable-init table" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Pasien</th>
                                    <th>Layanan</th>
                                    <th>Dokter</th>
                                    <th>Tangal Booking</th>
                                    <th>Jam Booking</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if(!empty($value->nama_pasien))
                                            {{ $value->nama_pasien }}
                                            @else 
                                            {{ $value->pasien_id }}
                                            @endif
                                        </td>
                                        <td>
                                           @php
                                                $layanan = $value->layananNya;
                                                $jumlah = count($layanan);
                                                $output = ''; // Inisialisasi variabel output

                                                if ($jumlah > 1) {
                                                    $output = implode(', ', array_slice($layanan, 0, $jumlah - 1)) . ' dan ' . end($layanan);
                                                } else {
                                                    $output = $layanan[0];
                                                }
                                            @endphp

                                            {{ $output }}
                                        </td>
                                        <td>{{ $value->nama_dokter }}</td>
                                        <td>{{ tgl_indo($value->tgl_booking) }}</td>
                                        <td>{{ $value->jam_booking }} WIB</td>
                                        <td>{{ number_format($value->total_harga) }}</td>
                                        <td>
                                            @if($value->status == 0)
                                                Menunggu Approve
                                            @elseif($value->status == 1)
                                                Approved 
                                            @else
                                                Rejected
                                            @endif
                                        </td>
                                        <td>
                                            <div class="drodown">
                                                <a class="dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown">Actions</a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <ul class="link-list-opt no-bdr">
                                                        
                                                        @if(session('auth_user')['role'] == 'admin')
                                                        <li class="dropdown-item">
                                                            <a href="{{ URL::to('invoice-booking/'.$value->id) }}"><i class='bx bx-book me-2'></i><span>Invoice</span></a>
                                                        </li>
                                                        
                                                        <li class="dropdown-item">
                                                            <a href="{{ URL::to('approve-booking/'.$value->id.'/1') }}"><i class='bx bx-comment-detail me-2'></i><span>Approve</span></a>
                                                        </li>
                                                        
                                                        <li class="dropdown-item">
                                                            <a href="{{ URL::to('approve-booking/'.$value->id.'/2') }}"><i class='bx bx-comment-detail me-2'></i><span>Reject</span></a>
                                                        </li>
                                                        @endif
                                                        <li class="dropdown-item">
                                                            <a href="{{ URL::to('edit-booking/'.$value->id) }}"><i class='bx bx-edit me-2'></i><span>Edit</span></a>
                                                        </li>
                                                        <li class="dropdown-item">
                                                            <a href="#modalDelete_{{ $value->id }}" data-bs-toggle="modal"><i class='bx bx-trash me-2'></i><span>Delete</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($data AS $keys => $values)
    @include('booking.modal.delete')
@endforeach

@endsection


