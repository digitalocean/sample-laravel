<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_name',
        'contact_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'consent',        
    ];

    public function scholarships(): HasMany {
        return $this->hasMany(Scholarship::class);
    }

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
