<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        if($email=="admin@adminadmin"&&$password=="admin"){
            Session::put('adminlogin',true);
            return redirect()->route('listpaket');
        }
        else{
            $cekemail=false;
            $cekpass=false;
            $id="";
            $datausers=Users::all();
            foreach ($datausers as $key => $value) {
                if($email==$value->email){
                    $cekemail=true;
                    if(password_verify($password,$value->password)){
                        $cekpass=true;
                        $id=$value->id;
                    }
                }
            }
            if($cekemail&&$cekpass){
                $userslogin=Users::findOrFail($id);
                Session::put('login',$userslogin);
                return redirect()->route('homepage');
            }
            else if(!$cekemail){return redirect()->back()->with("error","Email Not Found");}
            else if(!$cekpass){return redirect()->back()->with("error","Wrong Password");}
        }
    }
    public function logout(){
        
    }
}
