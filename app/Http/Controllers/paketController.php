<?php

namespace App\Http\Controllers;

use App\Model\countries;
use App\Model\dhotel;
use App\Model\dpaket;
use App\Model\flight;
use App\Model\hotel;
use App\Model\itenerarypaket;
use App\Model\maskapai;
use App\Model\paket_tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class paketController extends Controller
{
    //
    public function addPaket(Request $request){
        $file=$request->file('gambar');
        $tujuanfile='paketPicture';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$file->getClientOriginalName();
        $namapaketfile=str_replace(' ', '', $request->nama);
        // dd($namapaketfile);
        $file->storeAs($tujuanfile,"paket".$namapaketfile.".".$file->getClientOriginalExtension(),"public");
        // $file->move($tujuanfile,"paket$request->nama.".$file->getClientOriginalExtension());
        $totalbiaya=intval($request->hargaflight)+intval($request->hargahotel*$request->durasi)+intval($request->biayalain);
        $hargajual=$totalbiaya+($totalbiaya/100*$request->keuntungan);
        // dd($request->input("itenerary1"));
        $id=paket_tour::insertGetId([
            "nama_paket" => $request->nama,
            "negara_asal"=>$request->asalnegara,
            "negara_tujuan"=>$request->tujuannegara,
            "durasi"=>$request->durasi,
            "flight"=>$request->flight,
            "harga_flight"=>$request->hargaflight,
            "hotel"=>$request->hotel,
            "harga_hotel"=>($request->hargahotel*$request->durasi),
            "biayalain"=>$request->biayalain,
            "deskripsi"=>$request->deskripsi,
            "keuntungan"=>$request->keuntungan,
            "hargajual"=>$hargajual,
            "gambar"=>"paket".$namapaketfile.".".$file->getClientOriginalExtension()
        ]);
        for ($i=0; $i<$request->durasi ; $i++) { 
            // dd("itenerary".($i+1));
            itenerarypaket::insert([
                "idpaket"=>$id,
                "hari"=>$i+1,
                "itenerary"=>$request->input("itenerary".($i+1))
            ]);
        }
        
       
        return redirect()->route('listpaket')->with('berhasil add Paket');
    }
    public function listPaket(){
        $datapaket=paket_tour::all();
        $datanegara=countries::all();
        return view('admin.paket',["datapaket"=>$datapaket,"datanegara"=>$datanegara]);
    }
    public function searchPaket(Request $request) {
        $nama_paket = $request->nama_paket;
        $lokasi = $request->kota;
        $bulan = $request->bulan;
        // if($nama_paket != "")
        // {}
        // elseif ($lokasi != "")
        // {
        //     $param['dataTour']=DB::table('paket_tour as pt')
        //     ->join('countries as ct','pt.negara_tujuan','=','ct.id')
        //     ->select()
    
        // }
        // elseif ($bulan != ""){}
 
        // $request->validate([
        //     "nama" => "string|required"
        // ]);
        // // Lakukan searching buku
        // $arrBuku = paket_tour::query()
        //     // select * from buku where `LOWER(judul_buku)` like '%%';
        //     ->where(DB::raw("LOWER(nama_paket)"), "like", 
        //     "%".\strtolower($request->input("nama_paket"))."%")->get();
        // return \view("buku.search", [
        //     'data' => $arrBuku
        // ])->with("nama", $request->input("nama"));
    }
    public function detailpaket($id){
        $datapaket=paket_tour::where('id',$id)->get();
        $datahotel=hotel::all();
        $dataflight=flight::all();
        $datamaskapai=maskapai::all();
        $dataitenerary=itenerarypaket::where('idpaket',$id)->get();
        // dd($dataitenerary);
        return view('admin.detailpaket2',["datapaket"=>$datapaket,"datahotel"=>$datahotel,"dataflight"=>$dataflight,
        "dataitenerary"=>$dataitenerary,"datamaskapai"=>$datamaskapai]);
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
    // public function detailPaketView($id){
    //     // $datadetailpaket=dpaket::join('hotel','dpaket2.id_hotel','=','hotel.id')->where('id_paket',$id)->orderBy('hari','asc')->get();
    //     $datadetailpaket=dpaket::where('id_paket',$id)->orderBy('hari','asc')->get();
    //     $datahotel=hotel::all();
    //     return view('admin.detailpaket2',["datadetailpaket"=>$datadetailpaket,"idpaket"=>$id,"datahotel"=>$datahotel]);
    // }
    // public function tambahdetailPaketView($id){
    //     // $datadetailpaket=dpaket::join('hotel','dpaket2.id_hotel','=','hotel.id')->where('id_paket',$id)->orderBy('hari','asc')->get();
    //     $datadetailpaket=dpaket::where('id_paket',$id)->orderBy('hari','asc')->get();
    //     $paket=paket_tour::where('id',$id)->first();
    //     $dataHotel=hotel::where("kota",$paket->kota)->where("negara",$paket->negara)->get();
    //     // dd($paket->kota.$paket->negara);
    //     $harike=dpaket::where('id_paket',$id)->count()+1;
    //     return view('admin.tambahdetailpaket',
    //     ["datadetailpaket"=>$datadetailpaket,
    //     "idpaket"=>$id,
    //     "paket"=>$paket,
    //     "datahotel"=>$dataHotel,
    //     "harike"=>$harike]);
    // }
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
    public function ajaxpenerbangan($idasal,$idtujuan){
        // dd($idasal);
        $negaraasal=countries::find($idasal);
        $negaratujan=countries::find($idtujuan);
        $dataflightreturn=flight::where('asal',$negaraasal->name)->where('tujuan',$negaratujan->name)->get();
        if($dataflightreturn->isEmpty())return "";
        else return $dataflightreturn;
    }
    public function ajaxdataflight($id){
        $dataflight=flight::where('id',$id)->get();
        return $dataflight;
    }
    public function ajaxhotel($id){
        $datahotel=hotel::where('negara',$id)->get();
        if($datahotel->isEmpty())return "";
        else return $datahotel;
    }
    public function ajaxdatahotel($id){
        $dataflight=hotel::where('id',$id)->get();
        return $dataflight;
    }
     public function listTour()
    {
        //$dataTour=paket_tour::all();
        //return view('/paket',["dataTour"=>$dataTour]);
        $param["dataTour"] = DB::table('paket_tour as pt')
        // ->join('dpaket2 as dp','pt.id','=','dp.id_paket')
        ->select('pt.id','pt.nama_paket','pt.durasi','pt.negara_tujuan','pt.gambar','pt.hargajual')
        ->get();
        //return view('/paket',["dataTour"=>$dataTour]);
        return view('/paket')->with($param);
    }
    public function booking(Request $request)
    {
        $nama_depan= $request->namadepan;
        $nama_belakang = $request->namabelakang;
        $email = $request->email;
        $telp = $request->notelp;
        $nopaspor = $request->nopaspor;
        $id_paket = $request->id_tour;
        $param["dataTour"] = paket_tour::where('id',$id_paket)->get();
        return view('/order')->with($param);
    }
}
