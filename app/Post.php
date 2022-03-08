<?php
use App\User;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table Name
    protected $table = 'posts';
    //PrimaryKey
    public $PrimaryKey = 'id';
    //Time Stamp
    public $timeStamp = true;

    public function user(){
            return $this->belongTo('App\user');

    }
}
