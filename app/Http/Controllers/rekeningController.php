<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;


use Auth;

use App\user;

use App\rekening;

class rekeningController extends Controller
{
    public function tampilrekening(){
         $rekening= rekening::all();
   return view('admin.rekening',compact('rekening'));
    }
  public function formubahbank($id_rekening){
    $data= rekening::where('id_rekening',$id_rekening)->get();
    return view('admin.ubahrekening',compact('data'));
  }
  public function formtambahrekening(){
    return view('admin.tambahrekening');
  }
  public function simpan(Request $request){
$validator = Validator::make(request()->all(), [
    'atasnama' => 'required',
    'norekening' => 'required'
    
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = new rekening;
      $data->norekening = $request->norekening;
    $data->atasnama= $request->atasnama;
    $data->namabank=$request->namabank;
   
      $data->save();
        // echo $dat;
      return redirect('admin/rekening');
    }

   }
  
   public function ubah(Request $request, $id_rekening){
   $validator = Validator::make(request()->all(), [
    'atasnama' => 'required',
    'norekening' => 'required'
    
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = rekening::find($id_rekening);

  
     
      $data->norekening = $request->norekening;
    $data->atasnama= $request->atasnama;
    $data->namabank=$request->namabank;
   
      $data->save();
        // echo $dat;
      return redirect('admin/rekening');
    }

   }
}
