@extends('layouts.default')
@section('title', __( 'Tambah Produk' ))
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
                        
                        <h4 class="title nk-block-title">Tambah Produk</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('/do-add-produk') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Kategori Produk</label>
                                            <div class="form-control-wrap">
                                                <select name="kategori_product" id="" class="form-control">
                                                    <option value="Akupuntur">Akupuntur</option>
                                                    <option value="Apotek">Apotek</option>
                                                    <option value="Poli Estetika">Poli Estetika</option>
                                                    <option value="Poli Gigi">Poli Gigi</option>
                                                    <option value="Poli Perawatan">Poli Perawatan</option>
                                                    <option value="Poli Umum">Poli Umum</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Produk</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nama_produk" placeholder="Input Produk" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Harga</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="harga" placeholder="Input Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Deskripsi</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" name="deskripsi" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Gambar</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" name="image" placeholder="Input Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
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