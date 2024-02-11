<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Requirementcriteria extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = [
        'id',
        'name'
    ];

    public function scholarships(): BelongsToMany {
        return $this->belongsToMany(Scholarship::class, 'requirement_scholarships', 'requirement_id', 'scholarship_id');
    }

}
