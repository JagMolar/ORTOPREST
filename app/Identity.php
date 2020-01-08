<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected  $table = 'identity';
    //
    //Relación One To One
    public function user(){
        return $this->hasOne('App\User');
    }
    
}
