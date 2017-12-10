<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class pengajuan extends Model
{
    protected $table = "pengajuan";
    public $timestamps = true;
    protected $primaryKey="id_pengajuan";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
