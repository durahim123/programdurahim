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
            <div class="column col-lg-12 col-md-6 col-sm-12">
            
                <!-- Login Form -->
                <div class="login-form">
                @include('layouts.partials.notification')
                    <h2>Login</h2>
                    <!--Login Form-->
                    <form method="post" action="{{ URL::to('doLogin-user') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email " required>
                        </div>
                        
                        <div class="form-group">
                            <label>Enter Your Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">LOGIN</span></button>
                        </div>

                        <div class="form-group pass">
                            <a href="#" class="psw">Lupa password?</a>
                            <p style="float:right;">Belum Punya Akun? <a href="{{ URL::to('register-user') }}" class="psw"> Register</a></p>
                        </div>
                    </form>
                </div>
                <!--End Login Form -->
            </div>
        </div>
    </div>
</section>

@endsection