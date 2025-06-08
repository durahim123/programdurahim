<!-- ! Hide app brand if navbar-full -->
<div class="app-brand demo" style="">
    <a href="{{ URL::to('/dashboard') }}" class="app-brand-link">
        <img src="{{ asset('assets/images/health-clinic.png') }}" style="width: 45px;" alt="">
        <span class="app-brand-text demo menu-text fw-bold ms-2" style="text-transform: none;font-size: 0.85rem !important;">
            <span>KLINIK PRATAMA DR. JO</span>
        </span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

@php $link = request()->segment(1); @endphp
<ul class="menu-inner py-1">
    <li class="menu-item <?php if(empty($link) or $link == '/'){echo 'active';} ?>">
        <a href="{{ URL::to('/dashboard') }}" class="menu-link" >
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div class="text-truncate">Dashboards</div>
        </a>
    </li>
    @if(session('auth_user')['role'] == 'admin')
    <li class="menu-item <?php if($link == 'user' or $link == 'add-user' or $link == 'edit-user'){echo 'active';} ?>">
        <a href="{{ URL::to('/user') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div class="text-truncate">Admin</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'dokter' or $link == 'add-dokter' or $link == 'edit-dokter'){echo 'active';} ?>">
        <a href="{{ URL::to('/dokter') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male"></i>
            <div class="text-truncate">Dokter</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'pasien' or $link == 'add-pasien' or $link == 'edit-pasien'){echo 'active';} ?>">
        <a href="{{ URL::to('/pasien') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male-female"></i>
            <div class="text-truncate">Pasien</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'produk' or $link == 'add-produk' or $link == 'edit-produk'){echo 'active';} ?>">
        <a href="{{ URL::to('/produk') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div class="text-truncate">Produk</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'layanan' or $link == 'add-layanan' or $link == 'edit-layanan'){echo 'active';} ?>">
        <a href="{{ URL::to('layanan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div class="text-truncate">Layanan</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'booking' or $link == 'add-booking' or $link == 'edit-booking'){echo 'active';} ?>">
        <a href="{{ URL::to('booking') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book-open"></i>
            <div class="text-truncate">Booking</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'laporan-booking' or $link == 'add-laporan-booking' or $link == 'edit-laporan-booking'){echo 'active';} ?>">
        <a href="{{ URL::to('laporan-booking') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div class="text-truncate">Laporan Booking</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'konsultasi' or $link == 'add-konsultasi' or $link == 'edit-konsultasi'){echo 'active';} ?>">
        <a href="{{ URL::to('konsultasi') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chat"></i>
            <div class="text-truncate">Konsultasi</div>
        </a>
    </li>
    @else
    <li class="menu-item <?php if($link == 'layanan' or $link == 'add-layanan' or $link == 'edit-layanan'){echo 'active';} ?>">
        <a href="{{ URL::to('layanan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div class="text-truncate">Layanan</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'dokter' or $link == 'add-dokter' or $link == 'edit-dokter'){echo 'active';} ?>">
        <a href="{{ URL::to('/dokter') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male"></i>
            <div class="text-truncate">Dokter</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'booking' or $link == 'add-booking' or $link == 'edit-booking'){echo 'active';} ?>">
        <a href="{{ URL::to('booking') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book-open"></i>
            <div class="text-truncate">Booking</div>
        </a>
    </li>
    @endif
</ul>