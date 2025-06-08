<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    //
    public function index(){
        $data   = Users::where('role','admin')->get();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {   
        $us = new Users;
        $us->name = $request->name;
        $us->username = $request->username;
        if(!empty($request->password)){
            $us->password = Hash::make($request->password);
        }
        $us->role = $request->role;
        if($request->role == 'employee'){
            $us->nik_employee = $request->nik;
        }
        $us->email = $request->email;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('user')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
        
    }

    public function show($id_user)
    {
        $data = Users::where('id', $id_user)->first();
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id_user)
    {

        $us = Users::where('id', $id_user)->first();
        $us->name = $request->name;
        $us->username = $request->username;

        if(!empty($request->password)){
            $us->password = Hash::make($request->password);
        }
        
        $us->role = $request->role;
        if($request->role == 'employee'){
            $us->nik_employee = $request->nik;
        }
        $us->email = $request->email;
        $us->save();
        
        
        if ($us->save()) {
            return redirect('user')->with('success', 'Edit Data Success.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Data Failed.!');
        }
         
    }

    public function destroy($id_user)
    {
        $data = Users::where('id', $id_user)->delete();
        return redirect('user')->with('success', 'Delete Data Success.!');
    }

    
}
