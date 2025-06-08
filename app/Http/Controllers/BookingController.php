<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DetailBooking;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Layanan;
use Illuminate\Http\Request;
use PDF;
use App\Mail\SendPdfEmail;
use Illuminate\Support\Facades\Mail;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $data = Booking::join('dokters','dokters.id','dokter_id')
        ->join('pasiens','pasiens.id','pasien_id')
        ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
        ->get();
        
        foreach ($data as $key => $value) {
            $cekLayanan = DetailBooking::join('layanans','layanans.id','layanan_id')->where('booking_id', $value->id)->select('layanans.*')->get();
            $dataLayanan = [];
            foreach ($cekLayanan as $keys => $values) {
                $dataLayanan[] = $values->layanan;
            }
            $data[$key]->layananNya = $dataLayanan;
        }
        return view('booking.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokter = Dokter::get();
        $pasien = Pasien::get();
        $layanan = Layanan::get();
        return view('booking.create', compact('dokter','pasien','layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $totalHarga = 0;
        foreach ($request->layanan_id as $key => $value) {
            $harga = Layanan::where('id', $value)->first();
            $totalHarga += $harga->harga;
        }

        $us = new Booking;
        $us->pasien_id = $request->pasien_id;
        $us->dokter_id = $request->dokter_id;
        $us->tgl_booking = $request->tgl_booking;
        $us->jam_booking = $request->jam_booking;
        $us->metode = $request->metode;
        $us->total_harga = $totalHarga;
        $us->save();
        $last_id = $us->id;

        foreach ($request->layanan_id as $key => $values) {
            $cek = Layanan::where('id', $values)->first();

            $data = new DetailBooking();
            $data->booking_id = $last_id;
            $data->layanan_id = $values;
            $data->jumlah = 1;
            $data->harga_layanan = $cek->harga;
            $data->save();
        }

        if ($us->save()) {
            return redirect('booking')->with('success', 'Tambah Data Success.!');
        } else {
            return redirect()->back()->with('error', 'Tambah Data Failed.!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $data = Booking::where('id', $id)->first();
        $dokter = Dokter::get();
        $pasien = Pasien::get();
        $booking = DetailBooking::join('layanans','layanans.id','layanan_id')->select('layanans.*')->where('booking_id', $id)->get();
        $idLayanan = [];
        foreach($booking as $val){
            $idLayanan[] = $val->id;
        }
        $layanan = Layanan::get();
        return view('booking.edit', compact('data','dokter','pasien','layanan','booking','idLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $totalHarga = 0;
        foreach ($request->layanan_id as $key => $value) {
            $harga = Layanan::where('id', $value)->first();
            $totalHarga += $harga->harga;
        }
        DetailBooking::where('booking_id', $id)->delete();

        $us = Booking::where('id', $id)->first();
        $us->pasien_id = $request->pasien_id;
        $us->dokter_id = $request->dokter_id;
        $us->tgl_booking = $request->tgl_booking;
        $us->jam_booking = $request->jam_booking;
        $us->metode = $request->metode;
        $us->total_harga = $totalHarga;
        $us->save();
        
        foreach ($request->layanan_id as $key => $values) {
            $cek = Layanan::where('id', $values)->first();

            $data = new DetailBooking;
            $data->booking_id = $id;
            $data->layanan_id = $values;
            $data->jumlah = 1;
            $data->harga_layanan = $cek->harga;
            $data->save();
        }

        if ($us->save()) {
            return redirect('booking')->with('success', 'Edit Data Success.!');
        } else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Booking::where('id', $id)->delete();
        return redirect('booking')->with('success', 'Delete Data Success.!');
    }

    public function hapusbookingLayanan($id,$layanan_id)
    {
        $data = DetailBooking::where('booking_id', $id)->where('layanan_id', $layanan_id)->delete();
        return redirect()->back()->with('success', 'Hapus Data Berhasil.!');
    }

    /**
     * Display the specified resource.
     */
    public function invoice($id)
    {   
        $booking = Booking::where('id', $id)->first();
        $data = Booking::join('dokters','dokters.id','dokter_id')
        ->join('pasiens','pasiens.id','pasien_id')
        ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
        ->where('bookings.id', $id)
        ->get();
        
        foreach ($data as $key => $value) {
            $cekLayanan = DetailBooking::join('layanans','layanans.id','layanan_id')->where('booking_id', $value->id)->select('layanans.*')->get();
            $dataLayanan = [];
            foreach ($cekLayanan as $keys => $values) {
                $dataLayanan[] = array(
                    'layanan' => $values->layanan,
                    'harga' => $values->harga,
                );
            }
            $data[$key]->layananNya = $dataLayanan;
        }
        $dokter = Dokter::where('id', $booking->dokter_id)->first();
        $pasien = Pasien::where('id', $booking->pasien_id)->first();
        $pdf = PDF::loadview('booking.invoice',['data'=>$data, 'dokter' => $dokter, 'pasien'=>$pasien, 'dataLayanan' => $dataLayanan, 'booking' => $booking]);
        $pdf->setOptions([
            'isFontSubsettingEnabled' => true
        ]);
        return $pdf->stream();
    }

    public function approveOrRejectbooking($id, $approve)
    {       
        $detail = Booking::where('id', $id)->first();
        $pasien = Pasien::where('id', $detail->pasien_id)->first();
        if($approve == 1){
            $text = 'Hallo Bapak/Ibu '.$pasien->nama_pasien.' booking anda telah kami terima, silahkan datang sesuai dengan tanggal dan jam booking anda yaitu di tanggal '.$detail->tgl_booking.' dan jam '.$detail->jam_booking;
        }else{
            $text = 'Hallo Bapak/Ibu '.$pasien->nama_pasien.' booking anda belum bisa kami terima, silahkan lakukan booking ulang di tanggal dan jam yang diinginkan ';
        }
        $data = [
            'name'  => $pasien->nama_pasien,
            'email' => $pasien->email,
            'text'  => $text
        ];
        Mail::send('email_isi', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                    ->subject('Notifikasi');
        });

        $detail->status = $approve;
        $detail->save();
        if ($detail->save()) {
            return redirect('booking')->with('success', 'Edit Data Success.!');
        } else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }

    }

    public function laporan(Request $request)
    {   
        if(!empty($request->dari_tanggal)){
            $data = Booking::join('dokters','dokters.id','dokter_id')
                ->join('pasiens','pasiens.id','pasien_id')
                ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
                ->where('bookings.status', 1)
                ->whereBetween('tgl_booking', [$request->dari_tanggal, $request->sampai_tanggal])
                ->get();
        }else{
            $data = Booking::join('dokters','dokters.id','dokter_id')
                ->join('pasiens','pasiens.id','pasien_id')
                ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
                ->where('bookings.status', 1)
                ->get();
        }
        
        foreach ($data as $key => $value) {
            $cekLayanan = DetailBooking::join('layanans','layanans.id','layanan_id')->where('booking_id', $value->id)->select('layanans.*')->get();
            $dataLayanan = [];
            foreach ($cekLayanan as $keys => $values) {
                $dataLayanan[] = $values->layanan;
            }
            $data[$key]->layananNya = $dataLayanan;
        }

        $pdf = PDF::loadView('email_laporan', ['booking' => $data]);

        Mail::send('email_laporan', ['booking' => $data], function ($message) use ($pdf) {
            $message->to('adeum19@gmail.com')
                    ->subject('Laporan data transaksi')
                    ->attachData($pdf->output(), 'laporan data transaksi.pdf', [
                        'mime' => 'application/pdf',
                    ]);
        });

        return redirect()->back()->with('success', 'Kirim laporan berhasil.!');
    }

    public function laporanbooking(Request $request)
    {   
        $dari = '';
        $sampai = '';
        if(!empty($request->dari_tanggal)){
            $data = Booking::join('dokters','dokters.id','dokter_id')
                ->join('pasiens','pasiens.id','pasien_id')
                ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
                ->whereBetween('tgl_booking', [$request->dari_tanggal, $request->sampai_tanggal])
                ->get();

            $dari = $request->dari_tanggal;
            $sampai = $request->sampai_tanggal;
        }else{
            $data = Booking::join('dokters','dokters.id','dokter_id')
                ->join('pasiens','pasiens.id','pasien_id')
                ->select('bookings.*','pasiens.nama_pasien','dokters.nama_dokter')
                ->get();
        }
        
        
        foreach ($data as $key => $value) {
            $cekLayanan = DetailBooking::join('layanans','layanans.id','layanan_id')->where('booking_id', $value->id)->select('layanans.*')->get();
            $dataLayanan = [];
            foreach ($cekLayanan as $keys => $values) {
                $dataLayanan[] = $values->layanan;
            }
            $data[$key]->layananNya = $dataLayanan;
        }
        return view('booking.laporanbooking', compact('data', 'dari', 'sampai'));
    }
}
