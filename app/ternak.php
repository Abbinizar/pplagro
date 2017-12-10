<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ternak extends Model
{
    protected $table = "ternak";
    protected $primaryKey="id_ternak";
    public $timestamps = false;

    public  function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
