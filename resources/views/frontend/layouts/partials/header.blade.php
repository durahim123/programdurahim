<div class="header-lower">
        <div class="auto-container">    
            <!-- Main box -->
            <div class="main-box">
                <div class="logo-box">
                    <div class="logo"><a href="{{ URL::to('/') }}"><img src="{{ asset('assets/images/logo-1.jpg') }}" alt="" title=""></a></div>
                </div>

                <!--Nav Box-->
                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li><a href="{{ URL::to('data-dokter') }}">Jadwal Dokter</a></li>
                            <li><a href="{{ URL::to('data-reservasi') }}">Reservasi</a></li>
                            <li><a href="{{ URL::to('data-treatment') }}">Treatment</a></li>
                            <li><a href="{{ URL::to('data-produk') }}">Produk</a></li>
                            <li><a href="{{ URL::to('/tentang-kami') }}">Tentang Kami</a></li>
                            <li><a href="{{ URL::to('/testimoni') }}">Testimony</a></li>
                            <li class="dropdown">
                                <span>Konsultasi</span>
                                <ul>
                                    @php 
                                    $categoryChat = getCategoriChat(); 
                                    $bot_username = "DurahimBot";
                                    @endphp
                                    @foreach ($categoryChat as $key => $calChatCategory)
                                    <li>
                                        <a href="https://t.me/{{ $bot_username }}?start={{ $calChatCategory->name }}" target="_blank">
                                            {{ $calChatCategory->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @if (!empty(session('auth_user')))
                            <li><a href="{{ URL::to('reservasi-me') }}">Reservasi Saya</a></li>
                            <li><a href="{{ URL::to('logout-user') }}">Logout</a></li>
                            @else
                            <li><a href="{{ URL::to('login-user') }}">Login</a></li>
                            @endif
                        </ul>
                    </nav>
                    <!-- Main Menu End-->
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container">            

            <div class="main-box">
                <div class="logo-box">
                    <div class="logo"><a href="{{ URL::to('/') }}"><img src="{{ asset('assets/images/logo-1.jpg') }}" alt="" title=""></a></div>
                </div>
                
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{ URL::to('/') }}"><img src="{{ asset('assets/images/logo-1.jpg') }}" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Search Btn -->
                <div class="search-box">
                    <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
                </div>

                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>

    <!-- Header Search -->
    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times"></span></button>
        
        <div class="search-inner">
            <form method="post" action="https://skyethemes.com/html/2022/medicoz/blog-showcase.html">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Search..." required="">
                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Header Search -->