<?php

namespace App\Http\Controllers;

use App\Model\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    //
    public function logout(){
        if(Session::has('adminlogin'))Session::forget('adminlogin');Session::forget('id');Session::forget('nama');Session::forget('isi');Session::forget('ctr');Session::forget('laporan');
        return redirect()->route('homepage');
    }



}
