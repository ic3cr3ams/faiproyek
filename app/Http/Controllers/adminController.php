<?php

namespace App\Http\Controllers;

use App\Model\hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    //
    public function logout(){
        if(Session::has('adminlogin'))Session::forget('adminlogin');
        return redirect()->route('homepage');        
    }

    


}
