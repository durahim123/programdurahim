@extends('frontend.layouts.default')
@section('title', __( 'Data Produk' ))
@section('content')
<style>
    .page-item.active .page-link {
        background-color: #fab203 !important;
        border-color: #fab203 !important;
    }
    .page-link:focus {
        color: black !important;
    }
    .page-link {
        color: black;
    }
</style>
<section class="page-title" style="background-image: url({{ asset('medicoz') }}/images/background/8.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1>Produk</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Produk</li>
            </ul> 
        </div>
    </div>
</section>
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="our-shop">
                    <div id="layanan-list">
                        <div class="row">
                            @foreach ($product as $value)
                            <!-- Shop Item --> 
                            <div class="shop-item col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ URL::to('detail-data-produk/'.$value->id) }}">
                                                <img src="{{ asset('uploads/produk/'.$value->gambar) }}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h4 class="name"><a href="{{ URL::to('detail-data-produk/'.$value->id) }}">{{ $value->nama_produk }}</a></h4>
                                        <div class="price">Rp {{ number_format($value->harga) }}</div>
                                        <a href="{{ URL::to('detail-data-produk/'.$value->id) }}" class="theme-btn add-to-cart">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!--Styled Pagination-->
                    <div class="pagination" style="float: right;">
                        {{ $product->links('pagination::bootstrap-4') }}
                    </div>                
                    <!--End Styled Pagination-->
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <!--search box-->
                    <div class="sidebar-widget search-box">
                        <form method="get" action="{{ URL::to('data-produk') }}">
                            <div class="form-group">
                                <input type="search" name="nama_produk" value="" placeholder="Search....." required="">
                                <button type="submit"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>
                    <!-- Categories -->
                    <div class="sidebar-widget category-list">
                        <div class="sidebar-title"><h3>Categories</h3></div>
                        <ul class="cat-list">
                        <li><a href="#" class="filter-category" data-kategori="Akupuntur">Akupuntur</a></li>
                        <li><a href="#" class="filter-category" data-kategori="Apotek">Apotek</a></li>
                        <li><a href="#" class="filter-category" data-kategori="Poli Estetika">Poli Estetika</a></li>
                        <li><a href="#" class="filter-category" data-kategori="Poli Gigi">Poli Gigi</a></li>
                        <li><a href="#" class="filter-category" data-kategori="Poli Perawatan">Poli Perawatan</a></li>
                        <li><a href="#" class="filter-category" data-kategori="Poli Umum">Poli Umum</a></li>
                        <li><a href="#" class="filter-category" data-kategori="">Semua</a></li>
                        </ul>
                    </div>
                    <div class="filter-price">
                        <h4>Filter Harga</h4><hr>
                        <select id="price-range" class="form-control">
                            <option value="">Pilih Rentang Harga</option>
                            <option value="10000-50000">Rp 10.000 - Rp 50.000</option>
                            <option value="50001-100000">Rp 50.001 - Rp 100.000</option>
                            <option value="100001-500000">Rp 100.001 - Rp 500.000</option>
                            <option value="500001-1000000">Rp 500.001 - Rp 1.000.000</option>
                        </select>
                    </div>

                </aside>
            </div>
        </div>

    </div>
</div>
<!-- End Sidebar Container -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.filter-category', function () {
        // Ambil nilai kategori yang dipilih
        let kategori = $(this).data('kategori');

        // Ambil nilai harga yang dipilih
        let price_range = $('#price-range').val();

        // Kirim permintaan AJAX
        $.ajax({
            url: '{{ route("product.filter") }}',
            method: 'GET',
            data: {
                kategori: kategori,
                price_range: price_range
            },
            success: function(response) {
                if (response.success) {
                    // Update daftar layanan
                    $('#layanan-list .row').empty();
                    response.data.forEach(function(layanan) {
                        $('#layanan-list .row').append(`
                            <div class="shop-item col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="/detail-data-produk/${layanan.id}">
                                                <img src="/uploads/produk/${layanan.gambar}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h4 class="name"><a href="/detail-data-produk/${layanan.id}">${layanan.nama_produk}</a></h4>
                                        <div class="price">Rp ${Number(layanan.harga).toLocaleString()}</div>
                                        <a href="/detail-data-produk/${layanan.id}" class="theme-btn add-to-cart">Detail</a>
                                    </div>
                                </div>
                            </div>
                        `);
                    });

                    // Update pagination
                    $('.pagination').html(response.pagination);
                }
            },
            error: function() {
                alert('Gagal memuat data. Silakan coba lagi.');
            }
        });
    });

    $(document).on('change', '#price-range', function () {
        // Ambil nilai kategori yang dipilih (jika ada)
        let kategori = $('.filter-category.active').data('kategori') || '';
        
        // Ambil nilai harga dari dropdown
        let price_range = $(this).val();

        // Kirim permintaan AJAX
        $.ajax({
            url: '{{ route("product.filter") }}',
            method: 'GET',
            data: {
                kategori: kategori,
                price_range: price_range
            },
            success: function(response) {
                if (response.success) {
                    // Update daftar layanan
                    $('#layanan-list .row').empty();
                    response.data.forEach(function(layanan) {
                        $('#layanan-list .row').append(`
                            <div class="shop-item col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="/detail-data-produk/${layanan.id}">
                                                <img src="/uploads/produk/${layanan.gambar}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h4 class="name"><a href="/detail-data-produk/${layanan.id}">${layanan.nama_produk}</a></h4>
                                        <div class="price">Rp ${Number(layanan.harga).toLocaleString()}</div>
                                        <a href="/detail-data-produk/${layanan.id}" class="theme-btn add-to-cart">Detail</a>
                                    </div>
                                </div>
                            </div>
                        `);
                    });

                    // Update pagination
                    $('.pagination').html(response.pagination);
                }
            },
            error: function() {
                alert('Gagal memuat data. Silakan coba lagi.');
            }
        });
    });

</script>

@endsection