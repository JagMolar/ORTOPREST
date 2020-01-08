<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    //
    protected  $table = 'beneficiary';
    //un producto pertenece a un usuario
    public function products() {
        return $this->hasManyTo('App\Product');
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
//        return $this->belongsToMany(User::class);
    }
}
