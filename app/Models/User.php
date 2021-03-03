<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasOne('App\Models\Post'); // gonna lock for user_id by default , if we want to
      //  return $this->hasOne('app\Models\Post','other_name');      // change the name we need  add another parameter to the method 'hasOne like'
    }
    public function posts(){

        return $this->hasMany('App\Models\Post');

    }
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
    }
}
