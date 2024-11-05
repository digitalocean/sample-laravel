<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScholarshipQuestion extends Model
{
    use HasFactory;

    protected $table = 'scholarshipuses';

    protected $fillable = [
        'id',
        'scholarship_id',
        'question'
    ];

    public function scholarships(): BelongsToMany {
        return $this->belongsToMany(Scholarship::class, 'scholarshipQuestion_scholarships', 'question_id', 'scholarship_id');
    }
}
