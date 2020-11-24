<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\customer;
use App\Model\dhotel;
use App\Model\dpaket;
use App\Model\hotel;
use App\Model\htrans;
use App\Model\paket_tour;
use App\Model\trains;
use App\Model\pegawai;
use App\Model\dtrans;
use Illuminate\Support\Facades\Session;

class mctrl extends Controller
{
    function register(Request $r){
        $int = customer::all()->count();
        $ctr=$int+1;
        $id="";
        if ($int<10) {
            $d="CU000";
            $id=$d.$ctr;
        }
        if ($int>10) {
            $d="CU00";
            $id=$d.$ctr;
        }
        if ($int>100) {
            $d="CU0";
            $id=$d.$ctr;
        }
        $c = new customer();
        $c->customer_id = $id;
        $c->customer_name = $r->username;
        $c->customer_email = $r->email;
        $c->customer_alamat = $r->alamat;
        $c->customer_phone = $r->phone;
        $cr = customer::where('customer_name',$r->username)->count();
        if ($cr<1) {
            $c->save();
            return redirect("login",$r->username);
        }
        else{
            return redirect()->back();
        }
    }

    function log(Request $r){
        $cr = customer::where('customer_name',$r->username)->count();
        if ($cr>0) {
            Session::put("login",$r->username);
            return view('paket');
        }
        else return redirect()->back();
    }

    function logout(){
        // dd('oe');
        Session::flush();
        return view("index");
    }
}
