<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class detailCustController extends Controller
{
    public function lihatdetail(Request $r){
        $id = $r->id;
        $deskripsi = DB::table('paket_tour')->where('id',$id)->get(array('deskripsi','nama_paket','durasi'));
        Session::put('desc',$deskripsi);
        Session::put('idtour',$id);
        return view('detailpaket');
    }
    
}
