<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\htrans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetailHistory extends Controller
{
    public function Detailhistory(Request $r){
        $id = $r->id;
        Session::forget('history');
        $data = htrans::where('htrans_customer_id',$id)->join('dtrans','dtrans_id','htrans_id_order')->join('paket_tour','paket_tour.id','dtrans_tour')->join('customer','customer_id','htrans_customer_id')->get(array('htrans_date','htrans_total','foto','bank','nama_paket','nama_depan','nama_belakang','customer_id','htrans_id_order','htrans_status'));
        Session::put('History',$data);
        return view('admin.DetailHistoryCustomer');
    }
    public function accept(Request $r){
        $id = $r->id;
        $order = $r->order;
        DB::update('update htrans set htrans_status = 2 where htrans_id_order = ?', [$order]);
        Session::forget('history');
        $data = htrans::where('htrans_customer_id',$id)->join('dtrans','dtrans_id','htrans_id_order')->join('paket_tour','paket_tour.id','dtrans_tour')->join('customer','customer_id','htrans_customer_id')->get(array('htrans_date','htrans_total','foto','bank','nama_paket','nama_depan','nama_belakang','customer_id','htrans_id_order','htrans_status'));
        Session::put('History',$data);
        return view('admin.DetailHistoryCustomer');
    }
    public function deny(Request $r){
        $id = $r->id;
        $order = $r->order;
        DB::update('update htrans set htrans_status = 0 where htrans_id_order = ?', [$order]);
        Session::forget('history');
        $data = htrans::where('htrans_customer_id',$id)->join('dtrans','dtrans_id','htrans_id_order')->join('paket_tour','paket_tour.id','dtrans_tour')->join('customer','customer_id','htrans_customer_id')->get(array('htrans_date','htrans_total','foto','bank','nama_paket','nama_depan','nama_belakang','customer_id','htrans_id_order','htrans_status'));
        Session::put('History',$data);
        return view('admin.DetailHistoryCustomer');
    }
}
