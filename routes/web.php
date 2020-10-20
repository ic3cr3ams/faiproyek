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
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgotpass', function () {
    return view('forgotpass');
});

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
Route::get('admin/404', function () {
    return view('admin/404');
});
Route::get('admin/500', function () {
    return view('admin/500');
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
Route::get('admin/blank', function () {
    return view('admin/blank');
});
Route::get('admin/buttons', function () {
    return view('admin/buttons');
});
Route::get('admin/calendar', function () {
    return view('admin/calendar');
});
Route::get('admin/chartjs', function () {
    return view('admin/chartjs');
});
Route::get('admin/chat_room', function () {
    return view('admin/chat_room');
});
Route::get('admin/contactform', function () {
    return view('admin/contactform');
});
Route::get('admin/credits', function () {
    return view('admin/credits');
});
Route::get('admin/dropzone', function () {
    return view('admin/dropzone');
});
Route::get('admin/faq', function () {
    return view('admin/faq');
});
Route::get('admin/file_upload', function () {
    return view('admin/file_upload');
});
Route::get('admin/flot_chart', function () {
    return view('admin/flot_chart');
});
Route::get('admin/font_awesome', function () {
    return view('admin/font_awesome');
});
Route::get('admin/form_component', function () {
    return view('admin/form_component');
});
Route::get('admin/form_validation', function () {
    return view('admin/form_validation');
});
Route::get('admin/gallery', function () {
    return view('admin/gallery');
});
Route::get('admin/google_maps', function () {
    return view('admin/google_maps');
});
Route::get('admin/grids', function () {
    return view('admin/grids');
});
Route::get('admin/inbox', function () {
    return view('admin/inbox');
});
Route::get('admin/index-copy', function () {
    return view('admin/index-copy');
});
Route::get('admin/index', function () {
    return view('admin/index');
});
Route::get('admin/inline_editor', function () {
    return view('admin/inline_editor');
});
Route::get('admin/invoice', function () {
    return view('admin/invoice');
});
Route::get('admin/lobby', function () {
    return view('admin/lobby');
});
Route::get('admin/lock_screen', function () {
    return view('admin/lock_screen');
});
Route::get('admin/login', function () {
    return view('admin/login');
});
Route::get('admin/mail_compose', function () {
    return view('admin/mail_compose');
});
Route::get('admin/mail_view', function () {
    return view('admin/mail_view');
});
Route::get('admin/morris', function () {
    return view('admin/morris');
});
Route::get('admin/panels', function () {
    return view('admin/panels');
});
Route::get('admin/pricing_table', function () {
    return view('admin/pricing_table');
});
Route::get('admin/profile', function () {
    return view('admin/profile');
});
Route::get('admin/responsive_table', function () {
    return view('admin/responsive_table');
});
Route::get('admin/todo_list', function () {
    return view('admin/todo_list');
});
Route::get('admin/xchart', function () {
    return view('admin/xchart');
});