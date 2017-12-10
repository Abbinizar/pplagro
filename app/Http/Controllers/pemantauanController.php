<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pengajuan;
use App\roi;
use Validator;
use App\ternak;
use App\pembayaran;
use Auth;
use App\rekening;
use App\pemantauan;
use App\userdetail;
use App\user;


class pemantauanController extends Controller
{
   
   public function tampilpemantauan(){
    $data = pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->join('roi','roi.id_roi','=','pengajuan.id_roi')->where('ternak.id_user',Auth::user()->id)->where('statusinvest','Belum Selesai')->get();
    return view('peternak.laporaninvestasi',compact('data'));
   }
   public function tampiltambahpemantauan($id_pembayaran){
     $data = pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->join('roi','roi.id_roi','=','pengajuan.id_roi')->where('pembayaran.id_pembayaran',$id_pembayaran)->get();
     $laporan=pemantauan::where('id_pembayaran',$id_pembayaran)->get();

     return view('peternak.laporannya',compact('data','laporan'));
   }
   public function tampilinvestor(){
    $data = pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('pengajuan.id_investor',Auth::user()->id)->where('pembayaran.statusinvest','!=','Selesai')->get();
    return view('investor.laporaninvestasi',compact('data'));
   }
   public function lihatpemantauan($id_pembayaran){
    $data = pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->join('roi','roi.id_roi','=','pengajuan.id_roi')->where('pembayaran.id_pembayaran',$id_pembayaran)->get();
    $laporan=pemantauan::where('id_pembayaran',$id_pembayaran)->get();
    return view('investor.lihatpemantauan',compact('laporan','data'));
   }
   public function formpemantauan($id_pembayaran){
   $data= pembayaran::where('id_pembayaran',$id_pembayaran)->get();
   return view('peternak.formpemantauan',compact('data'));
   }
   public function formubahpemantauan($id_pemantauan){
   	$data = pemantauan::where('id_pemantauan',$id_pemantauan)->get();
   	return view('peternak.ubahpemantauan',compact('data'));
   }
   public function jualternak($id_pembayaran){
    $data = pembayaran::find($id_pembayaran);
    $data->statusinvest="Menunggu";
    $data->save();
    return redirect('investor/laporaninvestasi');
   }
   public function ubah(Request $request, $id_pemantauan){
   $validator = Validator::make(request()->all(), [
    'bobot' => 'required',
    'kondisi' => 'required'
    
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = pemantauan::find($id_pemantauan);

  
     
      $data->bobot = $request->bobot;
    $data->kondisi= $request->kondisi;
   
      $data->save();
        // echo $dat;
      return redirect('peternak/laporaninvestasi');
    }

   }
   public function simpan(Request $request, $id_pembayaran){
   	$data = new pemantauan;
         $validator = Validator::make(request()->all(), [
      'bobot'  => 'required',
      'kondisi' => 'required'
            
      ]);
        if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
     
   
    $data->id_pembayaran = $id_pembayaran;
       $data->bobot=$request->bobot;
       $data->kondisi=$request->kondisi;
       $data->statusinvestasi="Belum Selesai";
        $data->save();
      
        return redirect('peternak/laporaninvestasi');
   }}
   public function lihatinvestasiadmin(){
    $data=pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->join('roi','roi.id_roi','=','pengajuan.id_roi')->join('users','users.id','=','ternak.id_user')->where('pembayaran.status_bayar','lunas')->get();
    return view('admin.investasi',compact('data'));
   }
   public function detailinvestasi($id_pembayaran){
    $data = pemantauan::join('pembayaran','pembayaran.id_pembayaran','=','pemantauan.id_pembayaran')->where('pembayaran.id_pembayaran',$id_pembayaran)->get();
    return view('admin.detailinvestasi',compact('data'));
   }

}
?>
