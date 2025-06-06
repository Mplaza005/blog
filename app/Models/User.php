<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //  Relacion Uno A Uno
    public function profile(){
        //$profile = Profile::where('user_id',$this->id)->first();
        //$profile = Profile::where('foreing_key',$this->local_key)->first();
        //return $this->hasOne('App\Models\Profile','foreing_key','local_key'); 
        return $this->hasOne('App\Models\Profile'); 

    }
    // Relacion Uno a Muchos 
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //Relacion muchos a muchos
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

     //Relacion uno a uno polimorfica
     public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }

  

}
