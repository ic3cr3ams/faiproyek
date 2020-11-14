<?php

namespace App\Http\Controllers;

use App\chat as AppChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model\chat;

class ControllerChat extends Controller
{
    public function pilih(Request $r){
        Session::put('id',$r->id);
        Session::put('nama',$r->nama);
        Session::put('isi',chat::where('penerima',Session::get('id'))->orWhere('pengirim',Session::get('id'))->get());
        Session::put('ctr',chat::where('penerima',Session::get('id'))->orWhere('pengirim',Session::get('id'))->count());
        // dd(Session::get('isi'));

        return redirect()->back();
    }

    public function send(Request $r){
        $c = new chat();
        $c->pengirim = 'admin';
        $c->penerima = Session::get('id');
        $c->isi = $r->pesan;
        $c->save();
        Session::put('isi',chat::where('penerima',Session::get('id'))->orWhere('pengirim',Session::get('id'))->get());
        Session::put('ctr',chat::where('penerima',Session::get('id'))->orWhere('pengirim',Session::get('id'))->count());
        return redirect()->back();
    }
}
