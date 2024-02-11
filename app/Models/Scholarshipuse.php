<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Scholarshipuse extends Model
{
    use HasFactory;

    protected $table = 'scholarshipuses';

    protected $fillable = [
        'id',
        'name'
    ];

    public function scholarships(): BelongsToMany {
        return $this->belongsToMany(Scholarship::class, 'scholarshipuse_scholarships', 'scholarshipuse_id', 'scholarship_id');
    }
}
