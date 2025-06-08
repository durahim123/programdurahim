@extends('layouts.default')
@section('title', __( 'Edit Produk' ))
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
                        
                        <h4 class="title nk-block-title">Edit Produk</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('do-update-produk/'.$data->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Kategori Produk</label>
                                            <div class="form-control-wrap">
                                                <select name="kategori_product" id="" class="form-control">
                                                    <option value="Akupuntur" @if ($data->kategori_product == 'Akupuntur') selected @endif>Akupuntur</option>
                                                    <option value="Apotek" @if ($data->kategori_product == 'Apotek') selected @endif>Apotek</option>
                                                    <option value="Poli Estetika" @if ($data->kategori_product == 'Poli Estetika') selected @endif>Poli Estetika</option>
                                                    <option value="Poli Gigi" @if ($data->kategori_product == 'Poli Gigi') selected @endif>Poli Gigi</option>
                                                    <option value="Poli Perawatan" @if ($data->kategori_product == 'Poli Perawatan') selected @endif>Poli Perawatan</option>
                                                    <option value="Poli Umum" @if ($data->kategori_product == 'Poli Umum') selected @endif>Poli Umum</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Produk</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nama_produk" placeholder="Input Produk" value="{{ $data->nama_produk }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Harga</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="harga" placeholder="Input Harga"value="{{ $data->harga }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Deskripsi</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" name="deskripsi" id="content" rows="5" required>{{ $data->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Gambar</label>
                                            <span style="color: red; font-size: 12px; font-weight: normal;margin-left: 20px;">*Fill in the fields below to change the Image</span>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" name="image" placeholder="Input Harga">
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
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection