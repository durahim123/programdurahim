<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Pasien;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function doLoginUser(Request $request)
    {
        $checkUser = Users::where('email', $request->email)
            ->get()->first();
        if (!empty($checkUser)) {
            if (Hash::check($request->password, $checkUser->password)) {
                $request->session()->put('auth_user', $checkUser->toArray());
                return redirect('/');
            }
            else{
                return redirect()->back()->with('error', 'Password yang anda masukan salah.!');
            }
        }else {
            return redirect()->back()->with('error', 'Email Tidak Terdaftar.!');
        }
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function doRegister(Request $request)
    {
        $cekEmail = Pasien::where('email', $request->email)->first();
        if(!empty($cekEmail)){
            return redirect()->back()->with('error', 'Email Sudah Terdaftar.!');
        }

        $us = new Pasien;
        $us->nama_pasien = $request->nama_pasien;
        $us->jk = $request->jk;
        $us->no_hp = $request->no_hp;
        $us->email = $request->email;
        $us->tgl_lahir = $request->tgl_lahir;
        $us->alamat = $request->alamat;
        $us->save();

        if ($us->save()) {
            $as = new Users;
            $as->name = $request->nama_pasien;
            $as->username = $request->nama_pasien;
            $as->email = $request->email;
            $as->password = Hash::make($request->password);
            $as->pasien_id = $us->id;
            $as->role = 'pasien';
            $as->save();

            return redirect('/login-user')->with('success', 'Register Berhasil.!');
        }else {
            return redirect()->back()->with('error', 'Register gagal.!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/');
    }
}
