@extends('layouts.default')
@section('title', __( 'Edit Pasien' ))
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
                    <div class="card-inner">
                        
                        <h4 class="title nk-block-title">Edit Pasien</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('/do-update-pasien/'.$data->id) }}">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Nama</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nama_pasien" id="default-01" placeholder="Input Nama" value="{{ $data->nama_pasien }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-02">Jenis Kelamin</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                                    <option value="L" @if($data->jk == "L") selected @endif>Laki laki</option>
                                                    <option value="P" @if($data->jk == "P") selected @endif>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Tanggal Lahir</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" name="tgl_lahir" id="default-03" placeholder="Input Usia" value="{{ $data->tgl_lahir }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">No HP</label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control" name="no_hp" id="default-03" placeholder="Input No HP" required value="{{ $data->no_hp }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" name="email" id="default-03" placeholder="Input Email" required value="{{ $data->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Alamat</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="alamat" id="default-03" placeholder="Input Alamat" required value="{{ $data->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Username</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="username" id="default-03" placeholder="Input Username" required value="{{ $detailData->username }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-04">Password</label>
                                            <span style="color: red; font-size: 12px; font-weight: normal;margin-left: 20px;">*Fill in the fields below to change the password</span>
                                            <div class="form-control-wrap">
                                                <input type="password" name="password" class="form-control" id="default-04" placeholder="Input Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection