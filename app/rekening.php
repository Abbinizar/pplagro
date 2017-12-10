<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class rekening extends Model
{
    protected $table = "rekening";
    public $timestamps = true;
    protected $primaryKey="id_rekening";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
