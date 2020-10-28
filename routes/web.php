
<?php

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
Route::post('/log', 'mctrl@log');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/regis','mctrl@register');

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
});

Route::get('admin/advanced_form_components', function () {
    return view('admin/advanced_form_components');
});
Route::get('admin/advanced_table', function () {
    return view('admin/advanced_table');
});
Route::get('admin/basic_table', function () {
    return view('admin/basic_table');
});
Route::get('admin/flot_chart', function () {
    return view('admin/flot_chart');
});
Route::get('admin/form_component', function () {
    return view('admin/form_component');
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
