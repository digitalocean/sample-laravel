<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kiosk extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'kiosks';

    protected $fillable = [
        'Account_id',
        'MachineID',
        'TradeNO',
        'KioskName',
        'KioskAddress',
        'DecimalLocation',
        'Latitude',
        'Longitude'
    ];

    public function accounts(): BelongsTo {
        return $this->belongsTo(Account::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function meals(): BelongsToMany {
        return $this->belongsToMany(Meal::class)->withPivot('Total', 'StockTotal');
    }

    public function restocks(): HasMany {
        return $this->hasMany(Restock::class);
    }

    public function discounts(): HasMany {
        return $this->hasMany(Discount::class);
    }
}
