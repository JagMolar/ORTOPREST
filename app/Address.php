<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected  $table = 'address';
    
    
    //una dirección pertenece a un usuario
    public function user() {
        return $this->belongsTo('App\User');
    }

    //Relación One To Many
//    public function user(){
//        return $this->belongsTo('App\User', 'user_id');
//    }
}
