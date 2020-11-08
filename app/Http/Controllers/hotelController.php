<?php

namespace App\Http\Controllers;

use App\Model\dhotel;
use App\Model\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class hotelController extends Controller
{
    //
    public function listHotel(){
        $dataHotel=hotel::all();
        return view('admin.listHotel',["dataHotel"=>$dataHotel]);
    }
    public function addHotel(Request $request){
        $validation=$request->validate([
            "nama"=>"required",
            "alamat"=>"required",
            "kota"=>"required",
            "negara"=>"required"
        ]);
        hotel::insertGetId([
            "name"=>$request->nama,
            "alamat"=>$request->alamat,
            "kota"=>$request->kota,
            "negara"=>$request->negara,
        ]);
        return redirect()->route('listHotel')->with('success',"Berhasil Menambah Hotel");
    }
    public function deleteHotel($id){
        $hotel=hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('listHotel')->with('success',"Berhasil Delete Hotel");

    }
    public function editHotelView($id){
        $hotel=hotel::findOrFail($id);
        return view('admin.tambahHotel',["edit"=>true,"datahotel"=>$hotel]);

    }
    public function editHotel(Request $request){
        $hotel=hotel::findOrFail($request->id);
        
        $hotel->name=$request->nama;
        $hotel->alamat=$request->alamat;
        $hotel->save();
        return redirect()->route('listHotel')->with('success',"Berhasil Edit Hotel");
    }
    
    public function detailHotel($id){
        $hotel=hotel::findOrFail($id);
        $detailhotel=dhotel::where('id_hotel',$id)->get();
        Session::put('idhotel',$id);
        return view('admin.detailHotel',["detail"=>true,"datahotel"=>$hotel,"datadetail"=>$detailhotel]);
    }
    public function tambahdetailHotelview($id){
        return view('admin.tambahdetailHotel',["id"=>$id]);
    }
    public function tambahdetailHotel(Request $request){
        $breakfast=$request->breakfast;
        if(isset($breakfast)){
            $breakfast="1";
        }
        else{
            $breakfast="0";
        }
        dhotel::Insert([
            "id_hotel"=>$request->id,
            "kapasitas"=>$request->kapasitas,
            "jenis_kamar"=>$request->jeniskamar,
            "harga"=>$request->harga,            
            "breakfast"=>$breakfast,
            "keterangan"=>$request->keterangan
        ]);
        return Redirect::to("/admin/detailHotel/$request->id")->with('success',"Berhasil Menambah detail Hotel");
    }
}
