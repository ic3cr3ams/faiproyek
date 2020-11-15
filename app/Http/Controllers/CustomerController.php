<?php

namespace App\Http\Controllers;

use App\Model\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function lihat(Request $r){
        $ctr = customer::where('id_paket',$r->paket)->count();
        if ($ctr==0) {
            Session::put('customer','Tidak Ada Data');
        }
        else {
            $ctr=$r->paket;
            $data = customer::where('customer.id_paket',$r->paket)
                    ->join('paket_tour','paket_tour.id','=','customer.id_paket')
                    ->join('dpaket2','dpaket2.id_paket','customer.id_paket')
                    ->get(array('nama_depan','nama_belakang','nama','hargajual'));

            Session::put('customer',$data);
            return redirect()->back();
        }
    }
}
