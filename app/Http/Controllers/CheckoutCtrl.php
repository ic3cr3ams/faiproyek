<?php

namespace App\Http\Controllers;
use App\Model\htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
            'foto.required' => 'FIle Foto Harap Diisi !',
            'foto.mimes' => 'Format foto hanya JPG,PNG,JPEG'
        ]);
        $namaAsli1 = $r->file('foto')->getClientOriginalName();
        $path1 = $r->file('foto')->move('BuktiTransfer', "$namaAsli1");
        $idhtrans =Session::get('idhtrans');
        $h = htrans::find($idhtrans);
        $atm =$_COOKIE['atm'];
        $h ->Bank = $atm;
        $h ->foto=$namaAsli1;
        $h ->htrans_status=1;
        $h->save();
        return redirect()->route('jadwal');
    }
    public function home(){
        return redirect()->route('homepage');
    }
}
