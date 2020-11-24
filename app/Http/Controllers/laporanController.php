<?php

namespace App\Http\Controllers;
use App\Model\dtrans;
use App\Model\htrans;
use App\Model\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Charts;

class laporanController extends Controller
{
    public function lihat(Request $r){
        // $h = new dtrans();
        // $h->htrans_customer_id=1;
        // $h->htrans_status=1;
        // $h->htrans_date=date('Y-m-d');
        // $h->htrans_total=9000;
        // $h->save();
        $awal = $r->awal;
        $akhir = $r->akhir;
        // ->select(array(DB::raw('COUNT(htrans_customer_id) as jumlah')))
        // ->groupBy('htrans_customer_id')
        $data =DB::table('htrans')->whereBetween('htrans.htrans_date',[$awal,$akhir])->where('htrans_status','2')
                ->join('dtrans','dtrans_id','htrans_id_order')->join('hotel','dtrans_hotel','hotel.id')
                ->join('paket_tour','paket_tour.id',"dtrans_tour")->join('flight','flight.id','paket_tour.flight')
                ->join('customer','customer_id','htrans_customer_id')->get();
        $ctr =DB::table('htrans')->whereBetween('htrans.htrans_date',[$awal,$akhir])->where('htrans_status','2')
        ->join('dtrans','dtrans_id','htrans_id_order')->join('hotel','dtrans_hotel','hotel.id')
        ->join('paket_tour','paket_tour.id',"dtrans_tour")->join('flight','flight.id','paket_tour.flight')
        ->join('customer','customer_id','htrans_customer_id')->count();
        // dd($data);
        Session::put('jmlhlaporan',$ctr);
        if ($ctr>0) {
            Session::put('laporan',$data);
        }else Session::forget('laporan');
        return redirect()->back();
    }
}
