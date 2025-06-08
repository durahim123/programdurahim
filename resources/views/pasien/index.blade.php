@extends('layouts.default')
@section('title', __( 'Pasien' ))
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
                    <h4 class="nk-block-title" style="font-weight: bold;">List Pasien 
                        @if(session('auth_user')['role'] == 'admin')
                        <span><a href="{{ URL::to('/add-pasien') }}" class="btn btn-primary" style="float: right;">Tambah Data</a></span>
                        @endif
                    </h4>
                    <div class="card-inner">
                        
                        
                        
                        <table class="datatable-init table" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->nama_pasien }}</td>
                                        <td>
                                            @if($value->jk == "L")
                                                Laki laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ $value->umur }} Tahun</td>
                                        <td>{{ $value->no_hp }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->alamat }}</td>
                                        <td>
                                            @if($value->status == 1)
                                                Menikah
                                            @else
                                                Belum Menikah
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($value->id_rujukan))
                                            <a href="{{ URL::to('view-surat-rujukan/'.$value->id_rujukan) }}" class="btn btn-primary btn-sm">Lihat Surat</a>
                                            @endif
                                            @if(session('auth_user')['role'] == 'admin')
                                            <a href="{{ URL::to('edit-pasien/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#modalDelete_{{ $value->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal">Delete</button>
                                            @endif
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
    @include('pasien.modal.delete')
@endforeach

@endsection


