<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Booking;
use App\Models\DetailBooking;
use App\Models\Member;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use DB;
class ReservationController extends Controller
{
    public function dokter()
    {
        $dokter = Dokter::get();
        $jamDecode = [];
        $hariDecode = [];
        foreach ($dokter as $key => $value) {
            $jamDecode[$value->nama_dokter] = json_decode($value->jam_praktek);
            $hariDecode[$value->nama_dokter] = json_decode($value->hari_praktek);
        }
        $jadwalDokter = [];
        foreach ($hariDecode as $keys => $values) {
            $jam = [];
            foreach ($values as $kk => $vv) {
                $jam[$vv] = $jamDecode[$keys][$kk];
            }
            $jadwalDokter[$keys] = $jam;
        }
    	return view('frontend.reservation.dokter', compact('dokter', 'jadwalDokter'));
    }


    public function profilDokter($id)
    {   
        $dokter = Dokter::where('id', $id)->first();
        $jamDecode = [];
        $hariDecode = [];
        $jamDecode[$dokter->nama_dokter] = json_decode($dokter->jam_praktek);
        $hariDecode[$dokter->nama_dokter] = json_decode($dokter->hari_praktek);
       
        $jadwalDokter = [];
        foreach ($hariDecode as $keys => $values) {
            $jam = [];
            foreach ($values as $kk => $vv) {
                $jam[$vv] = $jamDecode[$keys][$kk];
            }
            $jadwalDokter[$keys] = $jam;
        }
    	return view('frontend.reservation.profil_dokter', compact('dokter', 'jadwalDokter'));
    }

    public function reservasi()
    {   
        if (empty(session('auth_user'))){
            return redirect('/login-user')->with('success', 'Tambah Data Success.!');
        }
        $dokter = Dokter::get();
        $pasien = Pasien::get();
        $layanan = Layanan::get();
        return view('frontend.reservation.reservasi', compact('dokter','pasien','layanan'));
    }

    public function reservasiMe()
    {   
        $data = Booking::join('dokters','dokters.id','dokter_id')
            ->select('bookings.*','dokters.nama_dokter')
            ->where('pasien_id', session('auth_user')['pasien_id'])
            ->get();
        foreach($data as $key => $value){
            $cekLayanan = DetailBooking::join('layanans','layanans.id','layanan_id')->select('layanans.*')->where('booking_id', $value->id)->get();
            $dataLayanan = [];
            foreach($cekLayanan as $val){
                $dataLayanan[] = $val->layanan;
            }
            $data[$key]->layanan = $dataLayanan;
        }
        return view('frontend.reservation.reservasiMe', compact('data'));
    }

    public function addDataReservasi(Request $request)
    {   
        $cekReservasi = Booking::where('tgl_booking', $request->tgl_booking)->where('jam_booking', $request->jam_booking)->count();
        if($cekReservasi > 0){
            return redirect()->back()->with('error', 'Reservasi gagal di tanggal dan jam tersebut sudah ada yang booking.!');
        }
        $tanggal_lahir = new DateTime($request->tgl_lahir);
        $sekarang = new DateTime("today");
        if ($tanggal_lahir > $sekarang) { 
        $thn = "0";
        $bln = "0";
        $tgl = "0";
        }
        $thn = $sekarang->diff($tanggal_lahir)->y;
        $idpasien = session('auth_user')['pasien_id'];
        $totalHarga = 0;
        foreach ($request->layanan_id as $key => $value) {
            $harga = Layanan::where('id', $value)->first();
            $totalHarga += $harga->harga;
        }

        $us = new Booking;
        $us->pasien_id = $idpasien;
        $us->dokter_id = $request->dokter_id;
        $us->tgl_booking = $request->tgl_booking;
        $us->jam_booking = $request->jam_booking;
        $us->total_harga = $totalHarga;
        $us->metode = $request->metode;
        $us->save();
        $last_id = $us->id;

        foreach ($request->layanan_id as $key => $values) {
            $cek = Layanan::where('id', $values)->first();

            $data = new DetailBooking;
            $data->booking_id = $last_id;
            $data->layanan_id = $values;
            $data->jumlah = 1;
            $data->harga_layanan = $cek->harga;
            $data->save();
        }
        if ($us->save()) {
            return redirect('/data-reservasi')->with('success', 'Reservasi Success.!');
        } else {
            return redirect()->back()->with('error', 'Reservasi Failed.!');
        }
    }

    public function getDokterByTanggal(Request $request)
    {
        $tanggalReservasi = $request->input('tgl_booking');
        $hari = Carbon::parse($tanggalReservasi)->locale('id')->isoFormat('dddd'); // Konversi ke nama hari

        $dokterJadwal = DB::table('dokters')
            ->whereJsonContains('hari_praktek', $hari)
            ->get();

        return response()->json($dokterJadwal);
    }

    public function getJadwalDokter(Request $request)
    {
        $jadwal = Booking::where('dokter_id', $request->dokter_id)
                        ->where('tgl_booking', $request->tgl_booking)
                        ->get();

        return response()->json($jadwal);
    }

}

?>