@extends('layouts.default')
@section('title', __( 'Tambah Dokter' ))
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
                        
                        <h4 class="title nk-block-title">Tambah Dokter</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('do-add-dokter') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">NIP/SIP</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nip" id="default-01" placeholder="Input NIP/SIP" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Nama Dokter</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nama_dokter" id="default-01" placeholder="Input Nama Dokter" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Spesialis</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="spesialis" id="default-01" placeholder="Input Spesialis" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Profil Dokter</label>
                                            <div class="form-control-wrap">
                                            <textarea class="form-control" id="content" placeholder="Enter the Description" rows="5" name="profil_dokter"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Gambar</label>
                                            <div class="form-control-wrap">
                                                <input type="file" class="form-control" name="image" id="default-01" placeholder="Input Judul proposal" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Hari Praktek</th>
                                                    <th>Jam Praktek</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];  @endphp
                                                @foreach($hari as $key => $value)
                                                <tr>
                                                    <td>{{ $value }}</td>
                                                    <td>
                                                        <input type="hidden" name="hari_praktek[]" value="{{ $value }}">
                                                        <input type="text" class="form-control" name="jam_praktek[]" id="default-03" placeholder="09:00 - 12:00">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection