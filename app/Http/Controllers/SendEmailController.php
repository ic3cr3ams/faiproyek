<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;
use App\Model\VerifEmail;
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
 
        $validate=$request->validate([
            "confirmpassword"=> "same:password"
        ],[
            "confirmpassword.same" => "password and password confirmation are not the same"
        ]);    
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
            $hash = md5( rand(0,100000000) );   // Generate random 32 character hash and assign it to a local variable.
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
        else{
            return redirect()->back();        
        }
        
    }
    public function verifcode(Request $request)
    {
        if(Session::has('emailreset')){
            $allverif=VerifEmail::where('email',Session::get('emailreset'))->get();
            foreach ($allverif as $key => $value) {
                $code=$value->verification_code;
            }
            $inputcode=$request->vercode;
            if($code==$inputcode){
                return redirect()->route("newpass");
            }
            else
            {
                return redirect()->back()->with('error','Kode Salah');
            }
            
        }
        else{
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
    public function resendregcode(){
        if(Session::has('datauser')){
            $datauser=Session::get('datauser');
            $emailtoverif=$datauser['email'];
            $nama=$datauser['nama'];
            $hash = md5( rand(0,100000000) );
            $data = array('nama'=>$nama, "body" => "Your verification code :".$hash);
            Mail::send('email', $data, function($message) use ($nama, $emailtoverif) {
            $message->to($emailtoverif, $nama)
            ->subject('Pray & Go Account Verification');
            $message->from('proyekfaitravel@gmail.com','Verifivation Code');
            }); 
            VerifEmail::insertGetId(
                [
                    'email'=>$emailtoverif,
                    'verification_code'=>$hash                    
                ]
            );  
            return redirect()->route('verifemail')->with('success',"Berhasil Resend Code");
        }
        else if(Session::has('emailreset')){
            $users=Users::where('email',Session::get('emailreset'))->first();
            $emailresend=Session::get('emailreset');
            $nama=$users->nama;
            $hash = md5( rand(0,100000000) );
            $data = array('nama'=>$nama, "body" => "Your verification code :".$hash);
            Mail::send('email', $data, function($message) use ($nama, $emailresend) {
            $message->to($emailresend, $nama)
            ->subject('Pray & Go Account Verification');
            $message->from('proyekfaitravel@gmail.com','Verifivation Code');
            }); 
            VerifEmail::insertGetId(
                [
                    'email'=>$emailresend,
                    'verification_code'=>$hash                    
                ]
            );  
            return redirect()->route('verifemailres')->with('success',"Berhasil Resend Code");
        }
    }
    public function sendverifresetpass(Request $request){
        $inputemail=$request->email;
        $datausers=Users::all();
        $cekemail=false;
        $nama="";
        foreach ($datausers as $key => $value) {
            if($value->email==$inputemail){
                $cekemail=true;
                $nama=$value->nama;
            }  
        }
        if($cekemail){
            Session::put('emailreset',$inputemail);
            $hash = md5( rand(0,100000000) );
            $data = array('nama'=>$nama, "body" => "Your verification code :".$hash);
            Mail::send('email', $data, function($message) use ($nama, $inputemail) {
            $message->to($inputemail, $nama)
            ->subject('Pray & Go Account Verification');
            $message->from('proyekfaitravel@gmail.com','Verifivation Code');
            }); 
            VerifEmail::insertGetId(
                [
                    'email'=>$inputemail,
                    'verification_code'=>$hash                    
                ]
            );  
            return view('verificationemail',["email"=>$inputemail]);

        }
        else{
            return redirect()->to(app('url')->previous()."#card")->with("error","Error Email Tidak Ditemukan");
        }
    }
    public function verifresetview()
    {
        if(Session::has('emailreset')){
            $emailverif=Session::get('emailreset');
            $codeverif=VerifEmail::select('verification_code')->where('email',$emailverif)->get();
            foreach ($codeverif as $key => $value) {
                $lastcode=$value->verification_code;
            }
            Session::put('codeverif',$lastcode);
            return view('verificationemailreset',["email"=>$emailverif]);
        }
        return redirect()->back();        
    }
    public function newpassword(Request $request){
        $validate=$request->validate([
            "confirmpassword"=> "same:password"
        ],[
            "confirmpassword.same" => "password and password confirmation are not the same"
        ]);        
        $password=password_hash($request->password,PASSWORD_DEFAULT);
        $users=Users::where('email',Session::get('emailreset'))->first();
        $users->password=$password;
        $users->save();
        Session::forget('codeverif');
        Session::forget('emailreset');
        return redirect()->route('login')->with('success',"Berhasil Reset Password");
    }
}
