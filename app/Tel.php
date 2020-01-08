<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tel extends Model
{
    protected  $table = 'tel';
    ////un telefono pertenece a un usuario
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
