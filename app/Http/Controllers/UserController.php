<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Komunitas;

use App\User;
use App\UserDetail;

use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    

    public function avatar(Request $request){
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 20000000)){
          if ($_FILES["file"]["error"] > 0){
            return back();
          }else{
              $imageName = 'avatar'.Auth::user()->id.'.' . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
              move_uploaded_file($_FILES["file"]["tmp_name"],
                  $_SERVER['DOCUMENT_ROOT'].'/img/avatar/' . $imageName);
          }
        }else{
            return back();
        }
        return back();
    }
    public function formubahprofil($id){
        $data = UserDetail::where('id',$id)->get();
        return view('peternak.ubahprofil',compact('data'));
    }
    public function ubahprofil(Request $request){
      $validator = Validator::make(request()->all(), [
      'name'  => 'required',
            'email'  => 'required',
            'nohp'=>'required'
            
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = User::find(Auth::user()->id);

     
      $data->email = $request->email;
      $data->name=$request->name;
      $data->nohp=$request->nohp;
      
      $data->save();
        // echo $dat;
      if (Auth::user()->status == 'Admin') {
          return redirect('admin/home');
      }
      else if (Auth::user()->status == 'Peternak') {
         return redirect('peternak/home');
      }
      else{
         return redirect('investor/home');
      }
     
}}
    
    public function lihatpeternak(){
        $data= user::where('status','Peternak')->get();
        return view('admin.user',compact('data'));

    }
     public function lihatinvestor(){
        $data= user::where('status','Investor')->get();
        return view('admin.user',compact('data'));

    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $komunitas = Komunitas::all();
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = User::where('id','=',Auth::user()->id);
        $request->offsetUnset('_token');
        $data->update($request->toArray());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
