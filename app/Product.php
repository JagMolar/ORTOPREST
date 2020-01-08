<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table = 'product';
    //un producto pertenece a un usuario
    public function beneficiaries() {
        return $this->belongsTo('App\Beneficiary');
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
//        return $this->belongsToMany(User::class);
    }
}
