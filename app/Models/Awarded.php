<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awarded extends Model
{
    use HasFactory;

    protected $collection = 'awardeds';

    protected $fillable = [
        'application_id',
        'scholarship_id',
        'award_amount',
        'comments'
    ];
}
