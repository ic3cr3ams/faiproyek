<?php

namespace App\Http\Controllers;
use App\Model\dtrans;
use App\Model\htrans;
use App\Model\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class laporanController extends Controller
{
    public function lihat(Request $r){
        // $h = new dtrans();
        // $h->htrans_customer_id=1;
        // $h->htrans_status=1;
        // $h->htrans_date=date('Y-m-d');
        // $h->htrans_total=9000;
        // $h->save();
        $thn = $r->tahun;
        $bln = $r->bulan;
        if ($thn!="-") {

        }
        Session::put('laporan',htrans::where('')->get());
        return redirect()->back();
    }
}
