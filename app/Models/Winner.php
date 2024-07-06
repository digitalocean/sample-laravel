<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Winner extends Model
{
    use HasFactory;

    protected $table = 'winners';
    protected $fillable = [
        'scholarship_id',
        'scholar_id',
        'studentName',
        'contactNumber',
        'studentEmail',
        'award_payments',
        'frequnecy',
        'distributionDate',
    ];

    public function scholarships() : BelongsTo {
        return $this->belongsTo(Scholarship::class);
    }
}
