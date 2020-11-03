<?php

namespace App\Http\Controllers;

use App\Model\paket_tour;
use Illuminate\Http\Request;

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
            "gambar"=>"paket".$namapaketfile.".".$file->getClientOriginalExtension()
        ]);
        return redirect()->route('listpaket')->with('berhasil add Paket');
    }
    public function listPaket(){
        $datapaket=paket_tour::all();
        // dd($datapaket->isEmpty());
        return view('admin.paket',["datapaket"=>$datapaket]);
    }
}
