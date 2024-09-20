<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model {
    use HasFactory;

    protected $table = 'meals';

    protected $guarded = [];

    public function kiosks(): BelongsToMany {
        return $this->belongsToMany(Kiosk::class, 'kiosk_meal', 'kiosks_id', 'meals_id')->withPivot('Total', 'StockTotal');
    }

}
