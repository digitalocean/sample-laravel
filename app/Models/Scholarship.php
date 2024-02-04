<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scholarship extends Model
{
    use HasFactory;

    protected $collection = 'scholarships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'partner_id',
        'name',
        'deadline',
        'description',
        'award_payments',
        'additional_information',
        'review_applicants',
        'selection_criteria',
        'requirement_criteria',
        'award_based_on',
        'renewability',
        'uses',
        'fund_amount'        
    ];

    public function partners(): BelongsTo {
        return $this->belongsTo(Partner::class);
    }

    public function applications(): BelongsTo {
        return $this->belongsTo(Application::class);
    }
}
