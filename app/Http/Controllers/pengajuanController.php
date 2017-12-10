<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pengajuan;

use App\ternak;
use Validator;
use Auth;
use App\roi;
use App\user;

use App\DetailSolusiLike;

class pengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function tambahPengajuan($id_ternak)
    {
        $users = user::all();
        $data = ternak::where('id_ternak','=',$id_ternak)->get();
        $roi=roi::all();
        $hitung3bulan=ternak::select('harga')->where('id_ternak','=',$id_ternak)->get();
        $datapengajuan = pengajuan::all();
        return view('investor.pengajuan',compact('data','users', 'datapengajuan','hitung3bulan','roi'));
        
    }
     public function simpan(Request $request, $id_ternak)
    {
        $data = new pengajuan;
         $validator = Validator::make(request()->all(), [
      'roi'  => 'required',
            
      ]);
        if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{

    }

       $dataternak= ternak::where('id_ternak',$id_ternak)->first();
        $data->id_ternak = $id_ternak;
        $data->id_investor = Auth::user()->id;
        $data->id_roi=$request->roi;
        $roi= roi::where('id_roi',$data->id_roi)->first();
        
        $data->total=$roi->rawat+$roi->pakan+$dataternak->harga+($dataternak->harga*1.3);
        $data->status='Menunggu Persetujuan';
      
        $data->save();
        return redirect('investor/lihatpengajuan');
    }

    public function showinvestor()
    {
      
        $users = user::all();
       
        
            $data=pengajuan::select('users.*','pengajuan.status as status_pengajuan','pengajuan.*','ternak.*','roi.*')->join('roi','roi.id_roi','=','pengajuan.id_roi')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->join('users','users.id','=','ternak.id_user')->where('pengajuan.id_investor',Auth::user()->id)->where('pengajuan.status','Menunggu Persetujuan')->get();
            $ternaknya=ternak::join('pengajuan','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->get();
        return view('investor.liatpengajuan',compact('data','users','ternaknya'));
    }
    public function lihatroi($id_pengajuan){
      $data=pengajuan::join('roi','roi.id_roi','=','pengajuan.id_roi')->join('ternak','ternak.id_ternak','=','pengajuan.id_ternak')->where('pengajuan.id_pengajuan',$id_pengajuan)->get();
      return view('investor.lihatroi',compact('data'));
    }
    public function tolakpengajuan($id_pengajuan){
      $data=pengajuan::find($id_pengajuan);
      $data->status="Ditolak";
      $data->save();
      return redirect('peternak/lihatpengajuan');
    }
  
 public function showpengajuan()
    {
        $users = user::all();
            $data = pengajuan::select('users.*','pengajuan.*','ternak.*','pengajuan.status as status_pengajuan')
            ->join('users','pengajuan.id_investor','=','users.id')->join('ternak','pengajuan.id_ternak','=','ternak.id_ternak')->where('ternak.id_user','=',Auth::user()->id)->where('pengajuan.status','=','Menunggu Persetujuan')->get();
             return view('peternak.liatpengajuan',compact('data','users'));
    }

    
 
  
     public function hapusData($id_pengajuan){
         $hapus = pengajuan::destroy($id_pengajuan);
          
            return redirect('investor/lihatpengajuan');
    }
   
}
