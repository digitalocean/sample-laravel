<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'accounts';

    protected $fillable = [
        'user_id',
        'Name',
        'Phone',
        'CompanyName',
        'CompanyAddress',
        'WalletAmount',
        'City',
        'State',
        'Zip',
        'Status',
        'type',
        'pin',
    ];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function kiosk(): HasMany {
        return $this->hasMany(Kiosk::class, 'Account_id');
    }
}
