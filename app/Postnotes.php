<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postnotes extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
    public function post(){
        return $this->belongsTo('App\Post','idpost','id');
    }
}
