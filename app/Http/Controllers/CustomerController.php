<?php

namespace App\Http\Controllers;

use App\Model\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function lihat(Request $r){
        $data = customer::all();
        $ctr = customer::where('id_paket',$r->paket)->count();
        if ($ctr==0) {
            Session::put('customer',$data);
        }
        else {
            $ctr=$r->paket;
            $data = customer::where('customer.id_paket',$r->paket)
                    ->join('paket_tour','paket_tour.id','=','customer.id_paket')
                    ->get(array('nama_depan','nama_belakang','customer_email','customer_phone','no_paspor','customer_id'));

                    // dd($data);
            Session::put('customer',$data);
        }

        return redirect()->back();
    }

    public function delete(Request $r){
        customer::where('customer_id',$r->id)->delete();
        $data = customer::all();
        Session::put('customer',$data);
        return view('admin.listCutomer');
    }
}
