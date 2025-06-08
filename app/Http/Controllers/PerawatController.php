<?php

namespace App\Http\Controllers;

use App\Models\Perawat;
use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function index(){
        $data   = Perawat::get();
        return view('perawat.index', compact('data'));
    }

    public function create()
    {
        return view('perawat.create');
    }

    public function store(Request $request)
    {   
        $us = new Perawat;
        $us->nama_perawat = $request->nama_perawat;
        $us->jenis_kelamin = $request->jenis_kelamin;
        $us->no_telp = $request->no_hp;
        $us->email = $request->email;
        $us->alamat = $request->alamat;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('perawat')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
        
    }

    public function show($id_perawat)
    {
        $data = Perawat::where('id', $id_perawat)->first();
        return view('perawat.edit', compact('data'));
    }

    public function update(Request $request, $id_perawat)
    {

        $us = Perawat::where('id', $id_perawat)->first();
        $us->nama_perawat = $request->nama_perawat;
        $us->jenis_kelamin = $request->jenis_kelamin;
        $us->no_telp = $request->no_hp;
        $us->email = $request->email;
        $us->alamat = $request->alamat;
        $us->save();
        
        
        if ($us->save()) {
            return redirect('perawat')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
         
    }

    public function destroy($id_perawat)
    {
        $data = Perawat::where('id', $id_perawat)->delete();
        return redirect('perawat')->with('success', 'Delete Data Success.!');
    }
}
