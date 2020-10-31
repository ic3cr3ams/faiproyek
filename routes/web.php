
<?php

use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout','mctrl@logout');
//ABOUT AND CONTACT
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

//BLOG
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-single', function () {
    return view('blog-single');
});
Route::get('/blog-single2', function () {
    return view('blog-single2');
});
Route::get('/blog-single3', function () {
    return view('blog-single3');
});
Route::get('/blog-single4', function () {
    return view('blog-single4');
});


//Login dan Register
Route::get('/login', function () {
    return view('login');
})->name("login");
// Route::post('/log', 'mctrl@log');
Route::post('/login', 'loginController@login');
Route::get('/register', function () {
    return view('register');
})->name('register');
// Route::post('/regis','mctrl@register');
Route::post('/regis','SendEmailController@index');
Route::post('/verifcode','SendEmailController@verifcode');
Route::post('/emailresetpass','SendEmailController@sendverifresetpass');
Route::post('/newpassword','SendEmailController@newpassword');
Route::get('/verifemail','SendEmailController@verifview')->name('verifemail');
Route::get('/verifemailreset','SendEmailController@verifresetview')->name('verifemailres');
Route::get('/resendregcode','SendEmailController@resendregcode')->name('resendregcode');
Route::view('/newpass',"newpass")->name('newpass');

Route::get('/forgotpass', function () {
    return view('forgotpass');
});
Route::get('logout','mctrl@logout');

//Detail paket
Route::get('/paket', function () {
    return view('paket');
});
Route::get('/detailpaket', function () {
    return view('detailpaket');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/checout', function () {
    return view('checout');
});
Route::get('/cekPesan', function () {
    return view('cekPesan');
});


//Index
Route::get('/', function () {
    return view('index');
})->name('homepage');

//Admin
Route::get('admin/paket', function () {
    return view('admin/paket');
});
Route::get('admin/tambahPaket', function () {
    return view('admin/tambahPaket');
});
Route::get('admin/editPaket', function () {
    return view('admin/editPaket');
});
Route::get('admin/lihatdetail', function () {
    return view('admin/lihatdetail');
});
Route::get('admin/listHotel', function () {
    return view('admin/listHotel');
});
Route::get('admin/tambahHotel', function () {
    return view('admin/tambahHotel');
});
Route::get('admin/editHotel', function () {
    return view('admin/editHotel');
});
Route::get('admin/listPesawat', function () {
    return view('admin/listPesawat');
});
Route::get('admin/tambahPesawat', function () {
    return view('admin/tambahPesawat');
});
Route::get('admin/editPesawat', function () {
    return view('admin/editPesawat');
});
Route::get('admin/flot_chart', function () {
    return view('admin/flot_chart');
});
Route::get('admin/listCutomer', function () {
    return view('admin/listCutomer');
});
Route::get('admin/detailCustomer', function () {
    return view('admin/detailCustomer');
});
Route::get('admin/laporan', function () {
    return view('admin/laporan');
});

Route::get('admin/form_validation', function () {
    return view('admin/form_validation');
});
Route::get('admin/index', function () {
    return view('admin/index');
});
Route::get('admin/invoice', function () {
    return view('admin/invoice');
});
Route::get('admin/profile', function () {
    return view('admin/profile');
});
Route::get('admin/advanced_form_components', function () {
    return view('admin/advanced_form_components');
});
Route::get('admin/advanced_table', function () {
    return view('admin/advanced_table');
});
