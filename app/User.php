<?php

namespace App;
//namespace Spatie\Permission\Traits;

use Illuminate\Notifications\Notifiable;
use App\Notifications\RestablecerContrasenaNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
//    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname1', 'surname2', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
//    public function setPasswordAttribute($value){
//        $this->attributes['password']= \Hash::make($value);
//    }
    
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new ResetPasswordNotification($token));
//    }
//    
    //Relación One To Many
    public function address(){
        return $this->hasMany('App\Address');
    }
    
    //una dirección pertenece a un usuario
    public function identity() {
        return $this->belongsTo('App\Identity');
    }
    
    //Relación One To One
    public function mail(){
        return $this->belongsTo('App\Mail');
    }
    
    //Relación One To Many
    public function tel(){
        return $this->belongsToMany('App\Tel');
    }
    
    public function products(){
        return $this->belongsToMany('App\Product');
    }
    
    public function beneficiaries(){
        return $this->belongsToMany('App\Beneficiary');
//        return $this->belongsToMany(Beneficiary::class);
    }
    
    
}
