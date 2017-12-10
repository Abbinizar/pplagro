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
use App\userdetail;
use App\user;
use App\penjualan;

class pembayaranController extends Controller
{
  public function penjualan(){
    $data=pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('ternak.id_user',Auth::user()->id)->where('pembayaran.statusinvest','!=','Belum Selesai')->get();
    return view('peternak.penjualan',compact('data'));
  }
  public function approval($id_pembayaran){
    $ubah = pembayaran::join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('roi','roi.id_roi','=','pengajuan.id_roi')->first();
       $data= pembayaran::where('pembayaran.id_pembayaran',$id_pembayaran)->get();
    $rekening= rekening::All();
    
    $ubah->statusinvest="Selesai";
    $ubah->save();
    return view('peternak.formtransfer', compact('data','rekening'));
  }



    public function lihatpembayaranternak(){
        
            $data=pembayaran::join('rekening','rekening.id_rekening','=','pembayaran.id_rekening')->join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('pembayaran.status_bayar','Belum bayar')->where('ternak.id_user',Auth::user()->id)->get();
   
        return view('peternak.lihatpembayaran',compact('data'));
    }
    public function lihatpembayaran(){
      $data=pembayaran::join('rekening','rekening.id_rekening','=','pembayaran.id_rekening')->join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('pengajuan.id_investor',Auth::user()->id)->where('pembayaran.status_bayar','belum bayar')->get();

      return view('investor.liatpengajuan', compact('data'));
     
    }
 
    public function tambahpembayaran($id_pengajuan){
$ajukan = pengajuan::find($id_pengajuan);
$pembayaran=new pembayaran;
$pembayaran->id_rekening="1";
$pembayaran->id_pengajuan=$id_pengajuan;
$pembayaran->status_bayar="belum bayar";
            $ajukan->status = "disetujui";  
            $pembayaran->statusinvest="Belum Selesai";
            $ajukan->save();
            $pembayaran->save();
            return redirect('peternak/lihatpengajuan');
    }
public function pembayaranrekening(Request $request, $id_pembayaran){
 
           
         $validator = Validator::make(request()->all(), [
          'buktitransfer'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          'rekening'=>'required'
            
      ]);
         if ($validator->fails()) {
         return back()
      ->withErrors($validator->errors());
         }
         else{
$bayar=pembayaran::find($id_pembayaran);

          
            if( $request->hasFile('buktitransfer')) {
        $photoName = time().'.'.$request->buktitransfer->getClientOriginalExtension();
       

        $request->buktitransfer->move(public_path('/img/buktitransfer'), $photoName);
         $bayar->buktitransfer=$photoName;
}
     
      $bayar->save();
return redirect ('investor/lihatpembayaran');
         }
  

}
public function simpanpenjualan(Request $request, $id_pembayaran){
 
           
         $validator = Validator::make(request()->all(), [
          'foto'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          'rekening'=>'required'
            
      ]);
         if ($validator->fails()) {
         return back()
      ->withErrors($validator->errors());
         }
         else{
$bayar=pembayaran::where('id_pembayaran',$id_pembayaran)->first();
$penjualan = new penjualan;

          
            if( $request->hasFile('foto')) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
       

        $request->foto->move(public_path('/img/buktitransfer'), $photoName);
         $penjualan->foto=$photoName;
}
$penjualan->id_rekening=$request->rekening;
$penjualan->id_pembayaran=$id_pembayaran;
     $penjualan->statuspenjualan="Belum Selesai";
      $penjualan->save();
return redirect ('peternak/penjualan');
         }
  

}
 public function ubahStatus($id_pembayaran){
      $data=pembayaran::find($id_pembayaran);
       $ternak = ternak::select('pengajuan.*','pembayaran.*','ternak.bobot as bobot_ternak','ternak.*','ternak.status as status_ternak')->join('pengajuan','pengajuan.id_ternak','=','ternak.id_ternak')->join('pembayaran','pembayaran.id_pengajuan','=','pengajuan.id_pengajuan')->where('pembayaran.id_pembayaran',$id_pembayaran)->first();
      $ternak->status="terjual";


      $ternak->save();
      $data->status_bayar="lunas";
      $data->save();
      return redirect('peternak/laporaninvestasi');

    }
   
public function tampilformbayar($id_pembayaran){
    $data= pembayaran::where('pembayaran.id_pembayaran',$id_pembayaran)->get();
    $rekening= rekening::All();
    return view('investor.formpembayaran',compact('data','rekening'));
}
public function lihatpembayaranpenjualan(){
   $data=penjualan::select('penjualan.*','pembayaran.*','pengajuan.*','rekening.*','ternak.*','penjualan.foto as fotobukti')->join('pembayaran','pembayaran.id_pembayaran','=','penjualan.id_pembayaran')->join('rekening','rekening.id_rekening','=','pembayaran.id_rekening')->join('pengajuan','pengajuan.id_pengajuan','=','pembayaran.id_pengajuan')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('penjualan.statuspenjualan','Belum Selesai')->get();
    return view('admin.penjualan',compact('data'));
  }
  public function konfirmasibayaradmin($id_penjualan){
    $penjualan = penjualan::where('id_penjualan',$id_penjualan)->first();
    $penjualan->statuspenjualan='Selesai';
    $penjualan->save();
    return redirect('admin/penjualan');
  }


}
?>
