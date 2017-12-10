<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class pembayaran extends Model
{
    protected $table = "pembayaran";
    public $timestamps = true;
    protected $primaryKey="id_pembayaran";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
