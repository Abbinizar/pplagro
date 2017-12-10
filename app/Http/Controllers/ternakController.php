<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ternak;
use App\user;
use Validator;
use App\Userdetail;
use Auth;

class ternakController extends Controller
{
    public function tambahternak()
    {
      $data=user::all();
      $ternak=Userdetail::where('status','Peternak')->get();
      if (Auth::user()->status == 'Admin') {
     return view('admin.tambahternak',compact('data','ternak'));
      }
      else{
         return view('peternak.tambahternak',compact('data','ternak'));
      }
     
    }
      public function tampilubahternak($id_ternak){
      $data = ternak::where('id_ternak',$id_ternak)->get();
      return view('peternak.ubahternak',compact('data'));

    }

       public function ubah(Request $request, $id_ternak){
   $validator = Validator::make(request()->all(), [
      'harga'  => 'required',
            'bobot'  => 'required',
            'foto'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'umur'=>'required',
            'lokasi'=>'required',
            'deskripsi'=>'required'
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = ternak::find($id_ternak);

      if( $request->hasFile('foto')) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/img/ternak'), $photoName);
        $data->foto=$photoName;
      }
     
      $data->jenisHewan = $request->jenisHewan;
      $data->harga=$request->harga;
      $data->bobot=$request->bobot;
      $data->umur=$request->umur;
      $data->lokasi=$request->lokasi;
      $data->deskripsi=$request->deskripsi;
   
        // $data->save();
      $data->save();
        // echo $dat;
      return redirect('peternak/home');
    }

    }
    public function simpan(Request $request)
    {
     $validator = Validator::make(request()->all(), [
      'harga'  => 'required',
            'bobot'  => 'required',
            'foto'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'umur'=>'required'
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = new ternak;

      if( $request->hasFile('foto')) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/img/ternak'), $photoName);
        $data->foto=$photoName;
      }
      if (Auth::user()->status=='Admin') {
       $data->id_user=$request->peternak;
      }
      else{
        $data->id_user = Auth::user()->id;
      }
      

      $data->jenisHewan = $request->jenisHewan;
      $data->harga=$request->harga;
      $data->bobot=$request->bobot;
      $data->umur=$request->umur;
      $data->lokasi=$request->lokasi;
      $data->deskripsi=$request->deskripsi;
      $data->status='belum terjual';
        // $data->save();
      $dat = ternak::insertGetId($data->toArray());
        // echo $dat;
      if (Auth::user()->status=='Admin') {
       return redirect('admin/home');
      }
      else{
         return redirect('peternak/home');
      }
     
    }
  }
  public function miliksemua(){
    $data = ternak::where('status','belum terjual')->get();
    if (Auth::user()->status == 'Admin') {
   return view('admin.ternak',compact('data')); 
    }
    else{
       return view('peternak.home',compact('data')); 
    }
   
  }
  public function hitung3bulan(){
    $users=user::all();

  }
    public function hapusTernak($id_ternak){
         $hapus = ternak::destroy($id_ternak);
          
            return redirect('peternak/home');
    }
      public function homepeternak(){

    
        $users = user::all();
        
            $data = ternak::select('ternak.status as statusjual','ternak.*')->join('users','ternak.id_user','=','users.id')->where('users.id','=',Auth::user()->id)->get()->where('status','belum terjual');
        
        return view('peternak.home',compact('data','users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
  }
