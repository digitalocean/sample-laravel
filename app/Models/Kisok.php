<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kisok extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kiosks';

    protected $fillable = [
        'Account_id',
        'MacnineID',
        'TradeNO',
        'KioskName',
        'KioskAddress'
    ];

    public function accounts(): BelongsTo {
        return $this->belongsTo(Account::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }
}
