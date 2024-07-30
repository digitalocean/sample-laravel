<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    protected $fillable = [
        'scholar_id',
        'title',
        'body',
        'noteType'
    ];

    public function scholar() : BelongsTo {
        return $this->belongsTo(Scholar::class);
    }
}
