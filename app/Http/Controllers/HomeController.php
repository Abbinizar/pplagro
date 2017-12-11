<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\ternak;
use App\user;
use Auth;
use App\investor

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function homeadmin(){

    
        $users = user::all();
        
            $data = ternak::join('users','ternak.id_user','=','users.id')->where('ternak.status','=','belum terjual')->get();
        
        return view('admin.home',compact('data','users'));
    }
  
      public function homeinvestor(){

    
        $users = user::all();
        
            $data = ternak::join('users','ternak.id_user','=','users.id')->where('ternak.status','=','belum terjual')->get();
        
        return view('investor.home',compact('data','users'));
    }
    

  public function lihatsemua(){

    $data = ternak::all();

    return view('investor.home',compact('data')); 
  }
    public function lihatternakadmin(){

    $data = ternak::where('status','belum terjual')->get();

    return view('admin.ternak',compact('data')); 
  }
  
}
