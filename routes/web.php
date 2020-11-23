<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\paketController;
use App\Http\Controllers\pesawatController;
use App\Http\Controllers\SendEmailController;
use App\Model\countries;
use App\Model\maskapai;
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

Route::get('/paket','paketController@listTour');
Route::post('/detailpaket', 'detailCustController@lihatdetail');


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

// //Detail paket
// Route::get('/paket', function () {
//     return view('paket');
// });
Route::get('/detailpaket', function () {
    return view('detailpaket');
});
Route::get('/order', function () {
    return view('order');
});
Route::post('/daftarPeserta', 'paketController@adddatacustomer');
Route::post('/order', 'paketController@booking');
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

//Punya Admin
Route::middleware("authAdmin")->group(function(){
    Route::prefix('admin')->group(function () {
        Route::post('deletecustomer','CustomerController@delete');

        Route::get('lihatlaporan','laporanController@lihat');
        Route::post('send','ControllerChat@send');
        Route::post('pilihcustomer','ControllerChat@pilih');

        // Oke !
        Route::view('index','admin.index')->name('indexadmin');

        Route::get('paket','paketController@listPaket' )->name('listpaket');

        Route::get('tambahPaket', function () {
            $datanegara=countries::all();
            return view('admin.tambahPaket2',["datanegara"=>$datanegara]);
        });
        Route::post('addPaket','paketController@addPaket');
        Route::post('/addHotel','hotelController@addHotel');
        Route::get('/editPaket/{param}','paketController@editPaketView');
        Route::get('/detailPaket/{param}','paketController@detailPaketView');
        Route::get('/tambahdetailpaket/{param}','paketController@tambahdetailPaketView');
        Route::get('/ajaxjenishotel/{param}','paketController@ajaxjenishotel');
        Route::get('/ajaxhargakamar','paketController@ajaxhargakamar');
        Route::get('/ajaxpenerbangan/{param1}/{param2}','paketController@ajaxpenerbangan');
        Route::get('/ajaxdataflight/{param}','paketController@ajaxdataflight');
        Route::get('/ajaxhotel/{param}','paketController@ajaxhotel');
        Route::get('/ajaxdatahotel/{param}','paketController@ajaxdatahotel');
        Route::get('/detailpaket/{param}','paketController@detailpaket');

        Route::post('/editpaket','paketController@editPaket');
        Route::get('lihatdetail', function () {
            return view('admin/lihatdetail');
        });
        Route::get('listHotel','hotelController@listHotel')->name('listHotel');
        Route::get('tambahHotel', function () {
            $datanegara=countries::all();
            return view('admin/tambahHotel',["datanegara"=>$datanegara]);
        });

        Route::post('/editHotel',"hotelController@editHotel");
        Route::get('editHotel/{param}',"hotelController@editHotelView");
        Route::get("detailHotel/{param}","hotelController@detailHotel");
        Route::get("tambahdetailHotel/{param}","hotelController@tambahdetailHotelview");
        Route::post("tambahdetailHotel","hotelController@tambahdetailHotel");
        Route::get("dHotel/{param}","hotelController@detailHotel");

        Route::get('deleteHotel/{param}',"hotelController@deleteHotel");
        Route::get('listPesawat','pesawatController@listFlight')->name('listPesawat');

        Route::get('tambahPesawat', function () {
            $datanegara=countries::all();
            $datamaskapai=maskapai::all()->sortBy('nama');
            return view('admin/tambahPesawat',["datanegara"=>$datanegara,"datamaskapai"=>$datamaskapai]);
        });
        Route::post('/addPesawat', 'pesawatController@tambahPesawat');
        Route::get('deletePesawat/{param}',"pesawatController@deleteFlight");
        Route::get('/ajaxnegaraasal/{param}','pesawatController@ajaxnegaraasal');
        Route::get('/ajaxnegaratujuan/{param}','pesawatController@ajaxnegaratujuan');
        Route::get('editPesawat', function () {
            return view('admin/editPesawat');
        });
        Route::get('flot_chart', function () {
            return view('admin/flot_chart');
        });
        Route::get('listCutomer', function () {
            return view('admin/listCutomer');
        });
        Route::post('pilihpaket','CustomerController@lihat');
        Route::get('detailCustomer', function () {
            return view('admin/detailCustomer');
        });
        Route::get('laporan', function () {
            return view('admin/laporan');
        });
        Route::get('laporanlaba', function () {
            return view('admin/laporanlaba');
        });

        Route::get('chat', function () {
            return view('admin/chat');
        });

        Route::get('form_validation', function () {
            return view('admin/form_validation');
        });
        Route::get('index', function () {
            return view('admin/index');
        });
        Route::get('invoice', function () {
            return view('admin/invoice');
        });
        Route::get('profile', function () {
            return view('admin/profile');
        });
        Route::get('advanced_form_components', function () {
            return view('admin/advanced_form_components');
        });
        Route::get('form_component', function () {
            return view('admin/form_component');
        });
        Route::get('advanced_table', function () {
            return view('admin/advanced_table');
        });
        Route::get('logout','adminController@logout');
    });
});

// Route::get('/admin/detailHotel/2',"hotelController@detailHotel");