<?php

namespace App\Http\Controllers;

use App\Model\countries;
use App\Model\htrans;
use App\Model\dtrans;
use App\Model\customer;
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
use Illuminate\Support\Facades\Session;
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
        $file->move($tujuanfile,"paket".$namapaketfile.".".$file->getClientOriginalExtension());
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
        // dd(Session::get('login'));
        Session::forget('login');
        Session::put('login',$request->login);
        $id_paket = $request->id_tour;
        $param["dataTour"] = paket_tour::where('id',$id_paket)->get();
        return view('/order')->with($param);
    }
    public function adddatacustomer(Request $request)
    {
        $nama_depan= $request->namadepan;
        $nama_belakang = $request->namabelakang;
        $email = $request->email;
        $telp = $request->notelp;
        $nopaspor = $request->nopaspor;
        $id_paket = $request->id_paket;
        $datacustomer = customer::all()->count();
        $id_customer="";
        if($datacustomer < 9 )
        {
            $id_customer="CU000".($datacustomer+1);
        }
        else if($datacustomer > 8)
        {
            $id_customer="CU00".($datacustomer+1);
        }
        else if($datacustomer > 99)
        {
            $id_customer="CU0".($datacustomer+1);
        }
        else if($datacustomer > 999)
        {
            $id_customer="CU".($datacustomer+1);
        }
        customer::insert([
            "customer_id"=>$id_customer,
            "nama_depan"=>$nama_depan,
            "nama_belakang"=>$nama_belakang,
            "customer_email"=>$email,
            "customer_phone"=>$telp,
            "no_paspor"=>$nopaspor,
            "id_paket"=>$id_paket
        ]);
        $data =[];
        if(!Session::has('listcust')){
            $data[]=[
                "nama"=>$nama_depan.' '.$nama_belakang
            ];
            $d = new htrans();
            $d ->htrans_customer_id=$id_customer;
            $d ->htrans_status=0;
            $d ->htrans_date=date('Y-m-d');
            $d ->htrans_total =$request->total;
            $d->foto="";
            $d->bank="";
            $d->save();
            Session::put('idhtrans',htrans::all()->count());
            $id = Session::get('idhtrans');

            $dt = new dtrans();
            $dt ->dtrans_id=$id;
            $hotel=paket_tour::where('id',$id_paket)->get('hotel');
            foreach ($hotel as $key => $value) {
                $dt ->dtrans_hotel = $value->hotel;
            }
            $dt ->dtrans_tour = $id_paket;
            $dt ->dtrans_harga = $request->total;
            $dt ->save();
            Session::put('idcust',$id_customer);
            Session::put('harga',$request->total);
            Session::put('listcust',$data);
        }
        else{
            // dd(Session::get('idhtrans'));
            $dt = new dtrans();
            $dt ->dtrans_id=Session::get('idhtrans');
            $hotel=paket_tour::where('id',$id_paket)->get('hotel');
            foreach ($hotel as $key => $value) {
                $dt ->dtrans_hotel = $value->hotel;
            }
            $dt ->dtrans_tour = $id_paket;
            $dt ->dtrans_harga = $request->total;
            $dt ->save();
            $data =Session::get('listcust');
            $data[]=["nama"=>$nama_depan.' '.$nama_belakang];
            Session::put('listcust',$data);
        }

        $param["dataTour"] = paket_tour::where('id',$id_paket)->get();
        return view('/order')->with($param);
    }
}
