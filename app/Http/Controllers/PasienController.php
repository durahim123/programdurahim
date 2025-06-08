<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Users;
use Illuminate\Http\Request;
use Hash;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data   = Pasien::get();
        return view('pasien.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $us = new Pasien;
        $us->nama_pasien = $request->nama_pasien;
        $us->jk = $request->jenis_kelamin;
        $us->tgl_lahir = $request->tgl_lahir;
        $us->no_hp = $request->no_hp;
        $us->email = $request->email;
        $us->alamat = $request->alamat;
        $us->save();
        $last_id = $us->id;
       
        
        if ($us->save()) {

            $as = new Users;
            $as->name = $request->nama_pasien;
            $as->username = $request->username;
            $us->email = $request->email;
            if(!empty($request->password)){
                $as->password = Hash::make($request->password);
            }
            $as->role = 'pasien';
            $as->pasien_id = $last_id;
            $as->email = $request->email;
            $as->save();

            return redirect('pasien')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien, $id_pasien)
    {
        $data = Pasien::where('id', $id_pasien)->first();
        $detailData = Users::where('pasien_id', $id_pasien)->first();
        return view('pasien.edit', compact('data', 'detailData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pasien)
    {
        $us = Pasien::where('id', $id_pasien)->first();
        $us->nama_pasien = $request->nama_pasien;
        $us->jk = $request->jenis_kelamin;
        $us->tgl_lahir = $request->tgl_lahir;
        $us->no_hp = $request->no_hp;
        $us->email = $request->email;
        $us->alamat = $request->alamat;
        $us->save();
        
        if ($us->save()) {

            $as = Users::where('pasien_id', $id_pasien)->first();
            $as->name = $request->nama_pasien;
            $as->username = $request->username;
            if(!empty($request->password)){
                $as->password = Hash::make($request->password);
            }
            $as->save();

            return redirect('pasien')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pasien)
    {
        $data = Pasien::where('id', $id_pasien)->delete();
        return redirect('pasien')->with('success', 'Delete Data Success.!');
    }
}
