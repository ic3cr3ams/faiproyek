<?php

namespace App\Http\Controllers;

use App\Model\airports;
use App\Model\countries;
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
}
