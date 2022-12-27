<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

	return view('welcome');
});

Route::get('/menuA', function () {
	return view('belajar.menupertama');
});

//PELANGGAN

//=============================================================================
Route::get('/menuB', 'MenuOneController@fungsimenu');

Route::get('/menuC/{user}/{pass}', 'MenuOneController@fungsimenuparameter');

Route::get('/pelanggan', 'MasterControll@daftarpelanggan');

Route::get('/delpelanggan/{id_pelanggan}', 'MasterControll@hapusdatapelanggan');

Route::get('/pelanggan', 'MasterControll@daftarpelanggan');

Route::get('/pemasok', 'MasterControll@daftarpemasok');

Route::get('/delpemasok/{id_pemasok}', 'MasterControll@hapusdatapemasok');

Route::get('/persediaan', 'MasterControll@daftarpersediaan');

Route::get('/delpersediaan/{id_persediaan}', 'MasterControll@hapusdatapersediaan');

Route::get('/satuan', 'MasterControll@daftarsatuan');

Route::get('/delsatuan/{id_satuan}', 'MasterControll@hapusdatasatuan');

Route::get('/delsatuan/{id_satuan}', 'MasterControll@hapusdatasatuan');

Route::get('/tambahpelanggan', 'MasterControll@formpelanggan');

Route::post('/simpanpelanggan', 'MasterControll@simpanpelanggan');

Route::get('/editpelanggan/{idss}', 'MasterControll@editpelanggan');

Route::post('/simpanpelangganedit', 'MasterControll@simpanpelangganedit');

Route::get('/inputbeli', 'BeliController@formbeli');

//PERSEDIAAN

Route::get('/tambahpersediaan', 'MasterControll@formpersediaan');
Route::post('/simpanpersediaan', 'MasterControll@simpanpersediaan');

Route::get('/daftarpembelian', 'BeliController@daftarpembelian');
Route::post('/simpanpembelian', 'BeliController@simpanpembelian');
Route::post('/hapuspembelian/{nobukti}', 'BeliController@hapuspembelian');
