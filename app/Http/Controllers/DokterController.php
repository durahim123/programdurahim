<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dokter::get();
        return view('dokter.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        foreach ($request->jam_praktek as $key => $value) {
            if(!empty($value)){
                $jsonHari[] = $request->hari_praktek[$key];
                $jsonJam[] = $value;
            }
        }
        $hariJson = json_encode($jsonHari);
        $jamJson = json_encode($jsonJam);
        $us = new Dokter;
        $us->nip = $request->nip;
        $us->nama_dokter = $request->nama_dokter;
        $us->hari_praktek = $hariJson;
        $us->jam_praktek = $jamJson;
        $us->profil_dokter = $request->profil_dokter;
        $us->spesialis = $request->spesialis;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/profil');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }

        $us->save();
        $last_id = $us->id;
        
        if ($us->save()) {
            return redirect('dokter')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_dokter)
    {
        $data = Dokter::where('id', $id_dokter)->first();
        $jamDecode = json_decode($data->jam_praktek);
        $hariDecode = json_decode($data->hari_praktek);

        $dataPraktek = [];
        foreach ($hariDecode as $key => $value) {
            $dataPraktek[$value] = $jamDecode[$key];
        }
        return view('dokter.edit', compact('data','dataPraktek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_dokter)
    {   
        foreach ($request->jam_praktek as $key => $value) {
            if(!empty($value)){
                $jsonHari[] = $request->hari_praktek[$key];
                $jsonJam[] = $value;
            }
        }
        $hariJson = json_encode($jsonHari);
        $jamJson = json_encode($jsonJam);
        $us = Dokter::where('id', $id_dokter)->first();
        $us->nip = $request->nip;
        $us->nama_dokter = $request->nama_dokter;
        $us->profil_dokter = $request->profil_dokter;
        $us->spesialis = $request->spesialis;
        $us->hari_praktek = $hariJson;
        $us->jam_praktek = $jamJson;
        $us->jam_praktek = $jamJson;
        $us->jam_praktek = $jamJson;
        $us->jam_praktek = $jamJson;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/profil');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }

        $us->save();
        
        if ($us->save()) {
            return redirect('dokter')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_dokter)
    {
        $data = Dokter::where('id', $id_dokter)->delete();
        return redirect('dokter')->with('success', 'Delete Data Success.!');
    }
}
