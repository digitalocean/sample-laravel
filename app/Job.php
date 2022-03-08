<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Job extends Model


{


    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }
}
