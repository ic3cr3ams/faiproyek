<?php

namespace App\Http\Controllers;
use App\Model\htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutCtrl extends Controller
{
    public function pindah(Request $r){
        Session::forget('harga');
        Session::put('harga',$r->totalharga);
        return redirect()->route('cout');
    }
    public function upload(Request $r){
        $validasi=$r->validate([
            'foto'=>'required|mimes:png,jpeg,jpg'
        ],[
            'required' => 'FIle Foto Harap Diisi !',
            'mimes' => 'Format foto hanya JPG,PNG,JPEG'
        ]);
        $namaAsli1 = $r->file('foto')->getClientOriginalName();
        $path1 = $r->file('foto')->storeAs('BuktiTransfer', "$namaAsli1", 'public');

        $htrans = htrans::findOrfail(Session::get('idcust'));
        $htrans ->foto=$namaAsli1;
        $htrans ->bank = Session::get('atm');
        $htrans->save();
        dd('asd');
        return redirect()->route('homepage');
    }
}
