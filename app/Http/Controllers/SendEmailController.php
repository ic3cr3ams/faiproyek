<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Mail\SendEmail;
use App\Users;
use App\VerifEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendEmailController extends Controller
{
    // public function index(){
 
    //     $to_name = "Gracielo Justine";
    //     $to_email = "cielo.justine01@gmail.com";
    //     $data = array('nama'=>"Gracielo justine", "body" => "A test mail");
    //     Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    //     $message->to($to_email, $to_name)
    //     ->subject('Laravel Test Mail');
    //     $message->from('proyekfaitravel@gmail.com','Test Mail');
    //     }); 
    // }
    public function index(Request $request){
 
        $datauser=Users::all();
        $cekemail=true;
        foreach($datauser as $key=>$value)
        {
            if($request->email==$value->email)$cekemail=false;
        }
        // dd($request->email);
        if($cekemail){
            $to_name =  $request->nama;
            $to_email = $request->email;
            $hash = md5( rand(0,100000000) ); // Generate random 32 character hash and assign it to a local variable.
            // Example output: f4552671f8909587cf485ea990207f3b
            $data = array('nama'=>$request->nama, "body" => "Your verification code :".$hash);
            Mail::send('email', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Pray & Go Account Verification');
            $message->from('proyekfaitravel@gmail.com','Verifivation Code');
            }); 
            VerifEmail::insertGetId(
                [
                    'email'=>$to_email,
                    'verification_code'=>$hash                    
                ]
            );  
            $datausers=[
                "nama"=>$to_name,
                "email"=>$to_email,
                "password"=>password_hash($request->password,PASSWORD_DEFAULT),
                "alamat"=>$request->alamat,
                "phone"=>$request->phone
            ];
            Session::put('datauser',$datausers);
            Session::put('emailtoverif',$to_email);
            return redirect()->route('verifemail');
        }
        else{
            return redirect()->back()->with("error","Email Sudah Digunakan");
        }        
    }
    public function verifview()
    {
        if(Session::has('emailtoverif')){
            $emailverif=Session::get('emailtoverif');
            $codeverif=VerifEmail::select('verification_code')->where('email',$emailverif)->get();
            foreach ($codeverif as $key => $value) {
                $lastcode=$value->verification_code;
            }
            Session::put('codeverif',$lastcode);
            return view('verificationemail',["email"=>$emailverif]);
        }
        return redirect()->back();
        
    }
    public function verifcode(Request $request)
    {
        $code=Session::get('codeverif');
        $inputcode=$request->vercode;
        if($code==$inputcode){
            $datausers=Session::get('datauser');
            Users::insertGetId([
                "password"=>$datausers['password'],
                "alamat"=>$datausers['alamat'],
                "nama"=>$datausers['nama'],
                "email"=>$datausers['email'],
                "phone"=>$datausers['phone'],
            ]);
            Session::forget('datauser');
            Session::forget('emailtoverif');
            Session::forget('codeverif');
            return redirect()->route('login')->with('sucess','berhasil register');
        }
        else
        {
            return redirect()->to(app('url')->previous()."#card")->with('error','Kode Salah');
        }

    }
}
