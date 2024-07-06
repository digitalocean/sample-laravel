<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scholarship extends Model
{
    use HasFactory;

    protected $table = 'scholarships';

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
        'fund_amount',
        'total'        
    ];

    public function partners(): BelongsTo {
        return $this->belongsTo(Partner::class);
    }

    public function applications(): BelongsToMany {
        return $this->belongsToMany(Application::class, 'scholarship_applications');
    }

    public function requirements(): BelongsToMany {
        return $this->belongsToMany(Requirementcriteria::class, 'requirement_scholarships');
    }

    public function selectioncriterias(): BelongsToMany {
        return $this->belongsToMany(Selectioncriteria::class, 'selectioncriteria_scholarships',  'selectioncriteria_id', 'scholarship_id');
    }

    public function scholarshipuses(): BelongsToMany {
        return $this->belongsToMany(Scholarshipuse::class, 'scholarshipuse_scholarships', 'scholarshipuse_id', 'scholarship_id');
    }

    public function winners(): HasMany {
        return $this->hasMany(Winner::class);
    }

}
