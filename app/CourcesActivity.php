<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourcesActivity extends Model
{
    protected $table = 'courseactivites';

    public function user() {
        return $this->belongsTo(App\User::class);
    }


}
