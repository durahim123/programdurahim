<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::get();
        return view('produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $us = new Product;
        $us->nama_produk = $request->nama_produk;
        $us->harga = $request->harga;
        $us->deskripsi = $request->deskripsi;
        $us->kategori_product = $request->kategori_product;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/produk');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }

        $us->save();
        $last_id = $us->id;
        
        if ($us->save()) {
            return redirect('produk')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_produk)
    {
        $data = Product::where('id', $id_produk)->first();
        return view('produk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_produk)
    {   
       
        $us = Product::where('id', $id_produk)->first();
        $us->nama_produk = $request->nama_produk;
        $us->harga = $request->harga;
        $us->deskripsi = $request->deskripsi;
        $us->kategori_product = $request->kategori_product;

        if ($request->hasfile('image')) {
            $extension       = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('uploads/produk');
            $request->file('image')->move($path, $fileNameToStore);

            $us->gambar = $fileNameToStore;
        }
        
        $us->save();
        
        if ($us->save()) {
            return redirect('produk')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_produk)
    {
        $data = Product::where('id', $id_produk)->delete();
        return redirect('produk')->with('success', 'Delete Data Success.!');
    }
}
