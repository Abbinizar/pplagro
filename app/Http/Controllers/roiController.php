<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;


use Auth;

use App\user;

use App\roi;

class roiController extends Controller
{
    public function tampilroi(){
         $roi= roi::all();
   return view('admin.roi',compact('roi'));
    }
  public function formubahroi($id_roi){
    $data= roi::where('id_roi',$id_roi)->get();
    return view('admin.ubahroi',compact('data'));
  }
  public function formtambahroi(){
    return view('admin.tambahroi');
  }
  public function simpan(Request $request){
$validator = Validator::make(request()->all(), [
    'jangka_waktu' => 'required',
    'pakan' => 'required',
    'rawat'=>'required',
    'asuransi'=>'required'
    
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = new roi;
      $data->jangka_waktu = $request->jangka_waktu;
    $data->pakan= $request->pakan;
    $data->rawat=$request->rawat;
    $data->asuransi=$request->asuransi;
   
      $data->save();
        // echo $dat;
      return redirect('admin/roi');
    }

   }
  
   public function ubah(Request $request, $id_roi){
   $validator = Validator::make(request()->all(), [
    'jangka_waktu' => 'required',
    'pakan' => 'required',
    'rawat'=>'required',
    'asuransi'=>'required'
    
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = roi::find($id_roi);
       $data->jangka_waktu = $request->jangka_waktu;
    $data->pakan= $request->pakan;
    $data->rawat=$request->rawat;
    $data->asuransi=$request->asuransi;
   
      $data->save();
        // echo $dat;
      return redirect('admin/roi');
    }

   }
}
