<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
	if (Auth::user()) {
		if (Auth::user()->status == 'Peternak') {
			return redirect('peternak/home');
		}else if(Auth::user()->status=='Investor'){
return redirect('investor/home');
		}
		else{
			return redirect('admin/home');
		}
		
	}else{
		return view('index');
	}
});
Route::get('admin/lihatbayar/kerjasama/{id}','pembayaranController@konfirmasibayaradmin');
Route::get('admin/penjualan','pembayaranController@lihatpembayaranpenjualan');
Route::post('peternak/konfirmasibayar/{id}','pembayaranController@simpanpenjualan');
Route::get('admin/lihatlaporan/{id}','pemantauanController@detailinvestasi');
Route::get('admin/investasi','pemantauanController@lihatinvestasiadmin');
Route::get('admin/ternak','ternakController@miliksemua');
Route::get('admin/peternak','UserController@lihatpeternak');
Route::get('admin/investor','UserController@lihatinvestor');
Route::post('ubahprofil','UserController@ubahprofil');
Route::get('peternak/ubahprofil/{id}','UserController@formubahprofil');
Route::get('peternak/ternak/hapus/{id}','ternakController@hapusTernak');
Route::get('admin/ubahbank/{id}','rekeningController@formubahbank');
Route::post('admin/simpanrekening','rekeningController@simpan');
Route::post('admin/simpanroi','roiController@simpan');
Route::get('admin/tambahrekening','rekeningController@formtambahrekening');
Route::get('admin/tambahroi','roiController@formtambahroi');
Route::get('admin/roi','roiController@tampilroi');
Route::get('admin/rekening','rekeningController@tampilrekening');
Route::post('admin/ubahrekening/{id}','rekeningController@ubah');
Route::post('admin/ubahroi/{id}','roiController@ubah');
Route::get('admin/ubahroi/{id}','roiController@formubahroi');
Route::get('peternak/miliksendiri','ternakController@homepeternak');
Route::get('peternak/formpemantauan/{id}','pemantauanController@formpemantauan');
Route::get('peternak/laporaninvestasi','pemantauanController@tampilpemantauan');
Route::get('peternak/ubahlaporan/{id}','pemantauanController@formubahpemantauan');
Route::post('peternak/ubahpemantauan/{id}','pemantauanController@ubah');
Route::get('peternak/miliksemua','ternakController@miliksemua');
Route::get('peternak/lihatpengajuan','pengajuanController@showpengajuan');
Route::get('peternak/laporan/{id}','pemantauanController@tampiltambahpemantauan');
Route::post('peternak/tambahpemantauan/{id}','pemantauanController@simpan');
Route::get('peternak/ternak/ubah/{id}','ternakController@tampilubahternak');
Route::get('peternak/lihatpengajuan/setujui/{id}','pembayaranController@tambahpembayaran');
Route::get('peternak/lihatpengajuan/tolak/{id}','pengajuanController@tolakpengajuan');
Route::get('investor/lihatpengajuan/batal/{id}','pengajuanController@hapusData');
Route::get('investor/lihatpembayaran','pembayaranController@lihatpembayaran');
Route::get('investor/konfirmasibayar/{id}','pembayaranController@tampilformbayar');
Route::get('investor/laporaninvestasi','pemantauanController@tampilinvestor');
Route::get('investor/konfirmasi','pengajuanController@showinvestor');
Route::get('investor/lihatlaporan/{id}','pemantauanController@lihatpemantauan');
Route::post('investor/konfirmasipembayaran/{id}','pembayaranController@pembayaranrekening');
Route::get('peternak/lihatpembayaran/kerjasama/{id}','pembayaranController@ubahstatus');
Route::get('investor/lihatroi/{id}','pengajuanController@lihatroi');
Route::get('investor/jual/{id}','pemantauanController@jualternak');
Route::get('peternak/penjualan','pembayaranController@penjualan');
Route::get('peternak/approval/{id}','pembayaranController@approval');
Route::get('peternak/home','ternakController@homepeternak');
Route::post('peternak/tambahternak/tambah','ternakController@simpan');
Route::post('admin/tambahternak/tambah','ternakController@simpan');
Route::post('peternak/ubah/{id}','ternakController@ubah');
Route::get('peternak/tambahternak','ternakController@tambahternak');
Route::get('admin/tambahternak','ternakController@tambahternak');
Route::get('investor/home/sapiperah','homeController@sapiperah');
Route::get('investor/home/lihatsemua','homeController@lihatsemua');
Route::get('investor/home/sapisimental','homeController@sapisimental');
Route::get('investor/home/sapibali','homeController@sapibali');
Route::get('peternak/lihatpembayaran','pembayaranController@lihatpembayaranternak');


Route::get('investor/home','HomeController@homeinvestor');
Route::get('admin/home','HomeController@lihatternakadmin');
Route::get('investor/pengajuan/{id}','pengajuanController@tambahPengajuan');
Route::post('investor/pengajuan/{id}/tambah','pengajuanController@simpan');
Route::get('investor/lihatpengajuan','pengajuanController@showinvestor');

Route::auth();
Route::get('/register','UserController@create');

Route::get('/home', 'HomeController@index');

Route::post('/user/avatar/upload','UserController@avatar');

