<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Layanan::get();
        return view('layanan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $us = new Layanan;
        $us->kategori_layanan = $request->kategori_layanan;
        $us->layanan = $request->layanan;
        $us->harga = $request->harga;
        $us->deskripsi = $request->deskripsi;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/layanan');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }

        $us->save();
        $last_id = $us->id;
        
        if ($us->save()) {
            return redirect('layanan')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_layanan)
    {
        $data = Layanan::where('id', $id_layanan)->first();
        return view('layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_layanan)
    {   
       
        $us = Layanan::where('id', $id_layanan)->first();
        $us->kategori_layanan = $request->kategori_layanan;
        $us->layanan = $request->layanan;
        $us->harga = $request->harga;
        $us->deskripsi = $request->deskripsi;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/layanan');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }
        
        $us->save();
        
        if ($us->save()) {
            return redirect('layanan')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_layanan)
    {
        $data = Layanan::where('id', $id_layanan)->delete();
        return redirect('layanan')->with('success', 'Delete Data Success.!');
    }
}
