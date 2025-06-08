@extends('layouts.default')
@section('title', __( 'Layanan' ))
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
                    <h4 class="nk-block-title" style="font-weight: bold;">List Layanan 
                        @if(session('auth_user')['role'] == 'admin')
                        <span><a href="{{ URL::to('/add-layanan') }}" class="btn btn-primary" style="float: right;">Tambah Data</a></span>
                        @endif
                    </h4>
                    <div class="card-inner">
                        <table class="datatable-init table" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Kategori Layanan</th>
                                    <th>Layanan</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    @if(session('auth_user')['role'] == 'admin')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->kategori_layanan }}</td>
                                        <td>{{ $value->layanan }}</td>
                                        <td>{{ number_format($value->harga) }}</td>
                                        <td>{!! $value->deskripsi !!}</td>
                                        <td>
                                            <img src="{{ asset('uploads/layanan/'.$value->gambar) }}" style="width:100px;" alt="">
                                        </td>
                                        @if(session('auth_user')['role'] == 'admin')
                                        <td>
                                            <a href="{{ URL::to('edit-layanan/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#modalDelete_{{ $value->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal">Delete</button>
                                        </td>
                                        @endif
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
    @include('layanan.modal.delete')
@endforeach

@endsection


