<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Define your controller below
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomesController;
use App\Http\Controllers\Frontend\ReservationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// No Rules

Route::get('/', [HomesController::class, 'index']);
Route::post('/bot', [HomesController::class, 'webhook']);
Route::get('/tentang-kami', [HomesController::class, 'tentangKami']);
Route::get('/testimoni', [HomesController::class, 'testimoni']);
Route::get('/data-treatment', [HomesController::class, 'layanan']);
Route::get('/detail-data-treatment/{id}', [HomesController::class, 'detailLayanan']);
Route::get('/layanan/filter', [HomesController::class, 'filterByCategory'])->name('layanan.filter');
Route::get('/data-produk', [HomesController::class, 'product']);
Route::get('/product/filter', [HomesController::class, 'filterProductByCategory'])->name('product.filter');
Route::get('/detail-data-produk/{id}', [HomesController::class, 'detailProduct']);

Route::get('/data-dokter', [ReservationController::class, 'dokter']);
Route::get('/profil-dokter/{id}', [ReservationController::class, 'profilDokter']);
Route::get('/data-reservasi', [ReservationController::class, 'reservasi']);
Route::get('/reservasi-me', [ReservationController::class, 'reservasiMe']);
Route::post('/do-add-data-reservasi', [ReservationController::class, 'addDataReservasi']);
Route::post('/get-dokter', [ReservationController::class, 'getDokterByTanggal'])->name('get.dokter');
Route::post('/get-jadwal-dokter', [ReservationController::class, 'getJadwalDokter']);

Route::get('/chat/categories', [HomesController::class, 'getCategories']);
Route::post('/send-chat', [HomesController::class, 'sendMessage']);

Route::get('register-user', [AuthController::class, 'register']);
Route::post('doRegister-user', [AuthController::class, 'doRegister']);
Route::get('login-user', [AuthController::class, 'login']);
Route::post('doLogin-user', [AuthController::class, 'doLoginUser']);
Route::get('logout-user', [AuthController::class, 'logout']);

Route::get('logout', [LoginController::class, 'logout']);

// Rules Before Login
Route::middleware(['authcheck'])->group(function() {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login/dologin', [LoginController::class, 'doLogin']);;
});

// Rules After Login
Route::middleware(['authlogedin'])->group(function(){
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::get('/konsultasi', [HomeController::class, 'konsultasi']);
    Route::post('/do-add-chat', [HomeController::class, 'doAddChat']);

    // Admin
    Route::get('/user', [UsersController::class, 'index']);
    Route::get('/add-user', [UsersController::class, 'create']);
    Route::post('/do-add-user', [UsersController::class, 'store']);
    Route::get('/edit-user/{id}', [UsersController::class, 'show']);
    Route::post('/do-update-user/{id}', [UsersController::class, 'update']);
    Route::get('/delete-user/{id}', [UsersController::class, 'destroy']);

    // Dokter
    Route::get('/dokter', [DokterController::class, 'index']);
    Route::get('/add-dokter', [DokterController::class, 'create']);
    Route::post('/do-add-dokter', [DokterController::class, 'store']);
    Route::get('/edit-dokter/{id}', [DokterController::class, 'show']);
    Route::post('/do-update-dokter/{id}', [DokterController::class, 'update']);
    Route::get('/delete-dokter/{id}', [DokterController::class, 'destroy']);

    // Produk
    Route::get('/produk', [ProductController::class, 'index']);
    Route::get('/add-produk', [ProductController::class, 'create']);
    Route::post('/do-add-produk', [ProductController::class, 'store']);
    Route::get('/edit-produk/{id}', [ProductController::class, 'show']);
    Route::post('/do-update-produk/{id}', [ProductController::class, 'update']);
    Route::get('/delete-produk/{id}', [ProductController::class, 'destroy']);

    // Pasien
    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/add-pasien', [PasienController::class, 'create']);
    Route::post('/do-add-pasien', [PasienController::class, 'store']);
    Route::get('/edit-pasien/{id}', [PasienController::class, 'show']);
    Route::post('/do-update-pasien/{id}', [PasienController::class, 'update']);
    Route::get('/delete-pasien/{id}', [PasienController::class, 'destroy']);

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/add-layanan', [LayananController::class, 'create']);
    Route::post('/do-add-layanan', [LayananController::class, 'store']);
    Route::get('/edit-layanan/{id}', [LayananController::class, 'show']);
    Route::post('/do-update-layanan/{id}', [LayananController::class, 'update']);
    Route::get('/delete-layanan/{id}', [LayananController::class, 'destroy']);

     // Booking
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/add-booking', [BookingController::class, 'create']);
    Route::post('/do-add-booking', [BookingController::class, 'store']);
    Route::get('/edit-booking/{id}', [BookingController::class, 'show']);
    Route::post('/do-update-booking/{id}', [BookingController::class, 'update']);
    Route::get('/delete-booking/{id}', [BookingController::class, 'destroy']);
    Route::get('/invoice-booking/{id}', [BookingController::class, 'invoice']);
    Route::get('/approve-booking/{id}/{approve}', [BookingController::class, 'approveOrRejectBooking']);
    Route::get('/laporan', [BookingController::class, 'laporan']);
    Route::get('/hapus-booking-layanan/{idbooking}/{idLayanan}', [BookingController::class, 'hapusBookingLayanan']);
    Route::get('/laporan-booking', [BookingController::class, 'laporanBooking']);

});
