<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class pemantauan extends Model
{
    protected $table = "pemantauan";
    public $timestamps = true;
    protected $primaryKey="id_pemantauan";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
