<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'orders';

    protected $guarded = [];

    public function kiosks(): BelongsTo {
        return $this->belongsTo(Kiosk::class);
    }
}
