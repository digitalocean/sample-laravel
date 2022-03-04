<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'country_id', 'biography'
    ];

    public function files()
    {
      return $this->hasMany(File::class);
    }
///////////////Roles
public function roles(){
    return $this->belongsToMany(Role::class, 'role_user');
}
public function invoices() {
    return $this->hasMany(App\Invoice::class);
}
public function payments() {
    return $this->hasMany(App\Payment::class);
}
public function subjects() {
    return $this->hasMany(App\Subject::class);
}
public function reference() {
    return $this->hasMany(App\Reference::class);
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
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function getuserData($id=0){

        if($id==0){
          $value=DB::table('users')->orderBy('id', 'asc')->get();
        }else{
          $value=DB::table('users')->where('id', $id)->first();
        }
        return $value;
      }

      public static function insertData($data){
        $value=DB::table('users')->where('username', $data['username'])->get();
        if($value->count() == 0){
          DB::table('users')->insert($data);
          return 1;
         }else{
           return 0;
         }

      }

      public static function updateData($id,$data){
        DB::table('users')
          ->where('id', $id)
          ->update($data);
      }

      public static function deleteData($id){
        DB::table('users')->where('id', '=', $id)->delete();
      }
}
