@extends('frontend.layouts.default')
@section('title', __( 'Login' ))
@section('content')

<!--Page Title-->
<section class="page-title bt-2" style="background-image: url({{ asset('assets/images/lorong.jpg') }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Login</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Login</li>
            </ul> 
        </div>
    </div>
</section>
<!--End Page Title-->
<section class="login-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-lg-12 col-md-12 col-sm-12">
                <!-- Login Form -->
                <div class="login-form" style="max-width:100% !important">
                    <h2>Register</h2>
                    <!--Login Form-->
                    <form method="post" action="{{ URL::to('doRegister-user') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama_pasien" class="form-control" placeholder="Nama " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Nama " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control" required>
                                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="number" name="no_hp" class="form-control" placeholder="No Telepon " required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email " required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Your Password</label>
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Register</span></button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group pass">
                                    <p>Sudah Punya Akun? <a href="{{ URL::to('login-user') }}" class="psw"> Login</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--End Login Form -->
            </div>
        </div>
    </div>
</section>

@endsection