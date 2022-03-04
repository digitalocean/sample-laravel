<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourcesActivity extends Model
{
     //table Name
     protected $table = 'courseactivites';
     //PrimaryKey
   //  public $PrimaryKey = 'id';
     //Time Stamp
   //  public $timeStamp = true;

     public function user(){
             return $this->belongTo('App\user');
     }

}
