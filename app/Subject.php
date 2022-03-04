<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function user() {
        return $this->belongsTo(App\User::class);
    }
}
