@extends('layouts.default')
@section('title', __( 'Produk' ))
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
                    <h4 class="nk-block-title" style="font-weight: bold;">List Produk 
                        <span><a href="{{ URL::to('/add-produk') }}" class="btn btn-primary" style="float: right;">Tambah Data</a></span>
                    </h4>
                    <div class="card-inner">
                        <table class="datatable-init table" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Kategori</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->kategori_product }}</td>
                                        <td>{{ $value->nama_produk }}</td>
                                        <td>{{ number_format($value->harga) }}</td>
                                        <td>{!! $value->deskripsi !!}</td>
                                        <td><img src="{{ asset('uploads/produk/'.$value->gambar) }}" style="width:100px;" alt=""></td>
                                        <td>
                                            <a href="{{ URL::to('edit-produk/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#modalDelete_{{ $value->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal">Delete</button>
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
    @include('produk.modal.delete')
@endforeach

@endsection


