<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
    public function category(){
        return $this->belongsTo('App\Category','idcategory','id');
    }
    public function postnotes(){
        return $this->hasMany('App\Postnotes','idpost','id');
    }
    
}
