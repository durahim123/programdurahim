<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Pasien;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $checkUser = Users::where('username', $request->username)
            ->get()->first();
        if (!empty($checkUser)) {
            if (Hash::check($request->password, $checkUser->password)) {
                $request->session()->put('auth_user', $checkUser->toArray());
                return redirect('/dashboard');
            }
            else{
                return redirect()->back()->with('error', 'Password yang anda masukan salah.!');
                die('Password yang anda masukan salah.!');
            }
        }else {
            return redirect()->back()->with('error', 'Username Tidak Terdaftar.!');
            die("Username Tidak Terdaftar");
        }
        debugCode($checkUser);
    }

    public function loginPasien()
    {
        return view('auth.loginPasien');
    }

    public function doLoginPasien(Request $request)
    {
        $checkPasien = Pasien::where('no_bpjs', $request->no_bpjs)->join('users','users.pasien_id','pasiens.id')->select('pasiens.*','users.role','users.name')->get()->first();

        if (!empty($checkPasien)) {
            $request->session()->put('auth_user', $checkPasien->toArray());
            return redirect('/dashboard');
        }else {
            return redirect()->back()->with('error', 'No BPJS Tidak Terdaftar.!');
            die("No BPJS Tidak Terdaftar");
        }
        debugCode($checkPasien);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/dashboard');
    }

    public function logoutPasien(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/login-pasien');
    }
}
