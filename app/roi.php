<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class roi extends Model
{
    protected $table = "roi";
    public $timestamps = true;
    protected $primaryKey="id_roi";

    function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    }
    ?>
