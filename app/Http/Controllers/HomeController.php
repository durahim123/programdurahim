<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat_categorie;
use App\Models\Chat_message;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {   
    	return view('home.index');
    }

    public function konsultasi()
    {   
        $data = Chat_message::get();
        $dataChat = Chat_message::join('pasiens','pasiens.id','user_id')->select('chat_messages.*','pasiens.nama_pasien')->groupBy('user_id')->get();
    	return view('home.konsultasi', compact('data','dataChat'));
    }

    public function doAddChat(Request $request)
    {   
        $as = new Chat_message;
        $as->user_id = $request->user_id;
        $as->message = $request->message;
        $as->is_bot = false;
        $as->sender_role = 'admin';
        $as->save();
        
        if ($as->save()) {
            return redirect('konsultasi')->with('success', 'Add Data Success!');
        }
        else {
            return redirect()->back()->with('error', 'Add Data Failed!');
        }
    }

    


}
