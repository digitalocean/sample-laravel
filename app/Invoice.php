<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table ="invoices";
    public function user() {
        return $this->belongsTo(App\User::class);
    }
}
