<?php

namespace App\Http\Controllers;

use App\Model\airports;
use App\Model\countries;
use App\Model\flight;
use App\Model\maskapai;
use Illuminate\Http\Request;

class pesawatController extends Controller
{
    //
    function ajaxnegaraasal($id){
        $datanegara=countries::find($id);
        $nama=strtoupper($datanegara->name);
        $dataAirport=airports::where('countryName',$nama)->get();
        return $dataAirport;
        // dd(strtoupper($datanegara->name));
    }
    function ajaxnegaratujuan($id){
        $datanegara=countries::find($id);
        $nama=strtoupper($datanegara->name);
        $dataAirport=airports::where('countryName',$nama)->get();
        return $dataAirport;
        // dd(strtoupper($datanegara->name));
    }
    public function tambahPesawat(Request $request){
        $validation=$request->validate(
            [
                "asalbandara" =>"different:tujuanbandara"],
            [
                "asalbandara.different"=>"bandara asal dan tujuan harus berbeda"
            ]
        );
        $negaraasal=countries::find($request->asalnegara);
        $airportasal=airports::find($request->asalbandara);
        $negaratujuan=countries::find($request->tujuannegara);
        $airporttujuan=airports::find($request->tujuanbandara);
        flight::insertGetId([
            "maskapai"=>$request->maskapai,
            "asal"=>$negaraasal->name,
            "bandara_asal"=>$airportasal->name,
            "kode_bandara_asal"=>$airportasal->code,
            "tujuan"=>$negaratujuan->name,
            "bandara_tujuan"=>$airporttujuan->name,
            "kode_bandara_tujuan"=>$airporttujuan->code,
            "harga"=>$request->harga,
            "durasi"=>$request->durasi
        ]);
        return redirect()->route('listPesawat')->with('success',"Sukes Menambah Flight");
    }
    public function listFlight(){
        $dataflight=flight::all();
        $datamaskapai=maskapai::all();
        return view('admin.listPesawat',['dataflight'=>$dataflight,"datamaskapai"=>$datamaskapai]);
    }
    public function deleteFlight($id){
        $dataflight=flight::find($id);
        $dataflight->delete();
        return redirect()->route('listPesawat')->with('success',"Berhasil Menghapus data pesawat");

    }
}
