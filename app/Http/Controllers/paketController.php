<?php

namespace App\Http\Controllers;

use App\Model\dhotel;
use App\Model\dpaket;
use App\Model\hotel;
use App\Model\paket_tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class paketController extends Controller
{
    //
    public function addPaket(Request $request){
        $lastid=1;
        $file=$request->file('gambar');
        $tujuanfile='paketPicture';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$file->getClientOriginalName();
        $namapaketfile=str_replace(' ', '', $request->nama);
        // dd($namapaketfile);
        $file->storeAs($tujuanfile,"paket".$namapaketfile.".".$file->getClientOriginalExtension(),"public");
        // $file->move($tujuanfile,"paket$request->nama.".$file->getClientOriginalExtension());
        paket_tour::insertGetId([
            "durasi"=>$request->durasi,
            "nama" => $request->nama,
            "kota"=>$request->kota,
            "negara"=>$request->negara,
            "deskripsi"=>$request->deskripsi,
            "keuntungan"=>$request->keuntungan,
            "gambar"=>"paket".$namapaketfile.".".$file->getClientOriginalExtension()
        ]);
        return redirect()->route('listpaket')->with('berhasil add Paket');
    }
    public function listPaket(){
        $datapaket=paket_tour::all();
        // dd($datapaket->isEmpty());
        return view('admin.paket',["datapaket"=>$datapaket]);
    }
    public function editPaketView($id){
        $datapaket=paket_tour::findOrFail($id);
        return view('admin.editpaket2',["datapaket"=>$datapaket]);
    }
    public function editPaket(Request $request){
        // dd($request->id);
        $datapaket=paket_tour::findOrFail($request->id);
        $file=$request->file('gambar');
        if(isset($file)){
            $namagambarold=$request->filegambarold;
            Storage::delete("paketPicture/$request->filegambarold");
            $tujuanfile='paketPicture';
            $fileExtensions=$file->getClientOriginalExtension();
            $fileName=$file->getClientOriginalName();
            $namapaketfile=str_replace(' ', '', $request->nama);
            // dd($namapaketfile);
            $file->storeAs($tujuanfile,"paket".$namapaketfile.".".$file->getClientOriginalExtension(),"public");
            $datapaket->gambar="paket".$namapaketfile.".".$file->getClientOriginalExtension();
        }
        $datapaket->durasi=$request->durasi;
        $datapaket->deskripsi=$request->deskripsi;
        $datapaket->keuntungan=$request->keuntungan;
        $datapaket->save();
        return redirect()->route('listpaket')->with('Berhasil Edit Paket');
    }
    public function detailPaketView($id){
        // $datadetailpaket=dpaket::join('hotel','dpaket2.id_hotel','=','hotel.id')->where('id_paket',$id)->orderBy('hari','asc')->get();
        $datadetailpaket=dpaket::where('id_paket',$id)->orderBy('hari','asc')->get();
        $datahotel=hotel::all();
        return view('admin.detailpaket2',["datadetailpaket"=>$datadetailpaket,"idpaket"=>$id,"datahotel"=>$datahotel]);
    }
    public function tambahdetailPaketView($id){
        // $datadetailpaket=dpaket::join('hotel','dpaket2.id_hotel','=','hotel.id')->where('id_paket',$id)->orderBy('hari','asc')->get();
        $datadetailpaket=dpaket::where('id_paket',$id)->orderBy('hari','asc')->get();
        $paket=paket_tour::where('id',$id)->first();
        $dataHotel=hotel::where("kota",$paket->kota)->where("negara",$paket->negara)->get();
        // dd($paket->kota.$paket->negara);
        $harike=dpaket::where('id_paket',$id)->count()+1;
        return view('admin.tambahdetailpaket',
        ["datadetailpaket"=>$datadetailpaket,
        "idpaket"=>$id,
        "paket"=>$paket,
        "datahotel"=>$dataHotel,
        "harike"=>$harike]);
    }
    public function ajaxjenishotel($id){
        $datajeniskamar=dhotel::where('id_hotel',$id)->get();
        return $datajeniskamar;
    }
    public function ajaxhargakamar(){
        $datajeniskamar=dhotel::where('id_hotel',$_GET['idhotel'])->where('jenis_kamar',$_GET['namajenis'])->first();
        return $datajeniskamar;
        // return $datajeniskamar;
    }
    public function tambahdetailPaket(Request $request){
        $datapaket=paket_tour::where('id',$request->idpaket)->first();
        $totalbiaya=$request->hargakamar+$request->biayalain;
        $hargajual=$totalbiaya+($totalbiaya*($datapaket->keuntungan/100));
        dpaket::insert([
            "id_paket"=>$request->idpaket,
            "hotel_id"=>$request->hotel,
            "hargahotel"=>$request->hargakamar,
            "hari"=>$request->harike,
            "itinerary"=>$request->itinerary,
            "biayalain"=>$request->biayalain,
            "totalbiaya"=>$totalbiaya,
            "hargajual"=>$hargajual
        ]);
        return Redirect::to("/admin/detailPaket/$request->idpaket")->with('success',"Berhasil Menambah detail Paket");

    }
}
