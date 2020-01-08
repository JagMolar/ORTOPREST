<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected  $table = 'mail';
    //
    //un correo pertenece a un usuario
    public function user(){
        return $this->hasOne('App\User');
    }
}
