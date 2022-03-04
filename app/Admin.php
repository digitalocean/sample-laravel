<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
protected $guard ='admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


        protected $hidden = [
            'password', 'remember_token',
        ];
///////////////Roles
public function roles(){
    return $this->belongsToMany(Role::class, 'role_user');
}

////////////////////Job function
public function job()
{
    return $this->hasMany('App\Job', 'client_id');
    }



//This is phone funtion
    public function phone()
    {
        return $this->hasOne('App\Phone');
        }





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
