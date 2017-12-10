<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class penjualan extends Model
{
    protected $table = "penjualan";
    public $timestamps = true;
    protected $primaryKey="id_penjualan";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
