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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/menu1', function () {
    return view('belajar.halamanmenu1');
});

//======================================= P E L A N G G A N  ===========================================


Route::get('/menu2','App\Http\Controllers\CobaController@menu2');

Route::get('/menuc/{user}/{pass}','App\Http\Controllers\CobaController@menu3');

Route::get('/pelanggan','App\Http\Controllers\MasterController@daftarpelanggan');

Route::post('/simpanpelanggan','App\Http\Controllers\MasterController@simpanpelanggan');

Route::get('/delpelanggan/{id}','App\Http\Controllers\MasterController@hapusdatapelanggan');

Route::get('/editpelanggan/{ids}','App\Http\Controllers\MasterController@editdatapelanggan');

Route::post('/simpanpelangganedit','App\Http\Controllers\MasterController@simpanpelangganedit');

Route::get('/tambahpelanggan','App\Http\Controllers\MasterController@formpelanggan');

//======================================= P E M A S O K  ===========================================

Route::get('/pemasok','App\Http\Controllers\MasterController@daftarpemasok');

Route::post('/simpanpemasok','App\Http\Controllers\MasterController@simpanpemasok');

Route::get('/delpemasok/{id}','App\Http\Controllers\MasterController@hapusdatapemasok');

Route::get('/editpemasok/{ids}','App\Http\Controllers\MasterController@editdatapemasok');

Route::post('/simpanpemasokedit','App\Http\Controllers\MasterController@simpanpemasokedit');

Route::get('/tambahpemasok','App\Http\Controllers\MasterController@formpemasok');

//======================================= MASTER BELI  ===========================================


Route::get('/belim','App\Http\Controllers\MasterController@daftarbelim');

Route::post('/simpanbelim','App\Http\Controllers\MasterController@simpanbelim');

Route::get('/delbelim/{id}','App\Http\Controllers\MasterController@hapusdatabelim');

Route::get('/editbelim/{ids}','App\Http\Controllers\MasterController@editdatabelim');

Route::post('/simpanbelimedit','App\Http\Controllers\MasterController@simpanbelimedit');

Route::get('/tambahbelim','App\Http\Controllers\MasterController@formbelim');


//======================================= DETAIL BELI  ===========================================


Route::get('/belid','App\Http\Controllers\MasterController@daftarbelid');

Route::post('/simpanbelid','App\Http\Controllers\MasterController@simpanbelid');

Route::get('/delbelid/{id}','App\Http\Controllers\MasterController@hapusdatabelid');


Route::post('/simpanbelidedit','App\Http\Controllers\MasterController@simpanbelidedit');

Route::get('/tambahbelid','App\Http\Controllers\MasterController@formbelid');

//======================================= P E M B E L I A N  ===========================================

Route::get('/pembelian','App\Http\Controllers\BeliController@daftarpembelian');

Route::get('/inputbeli','App\Http\Controllers\BeliController@formbeli');

Route::post('/simpanbeli','App\Http\Controllers\BeliController@simpanbeli');

Route::get('/delbeli/{id}','App\Http\Controllers\BeliController@hapusdatabeli');

Route::get('/editbeli/{nobuk}','App\Http\Controllers\BeliController@editdatabeli');

Route::get('/editbelid/{nobuk}','App\Http\Controllers\BeliController@editdatabeli');

Route::get('/cetakbeli/{nobuk}','App\Http\Controllers\BeliController@cetakdatabeli');
