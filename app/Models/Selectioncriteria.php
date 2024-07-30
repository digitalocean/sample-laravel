<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Selectioncriteria extends Model
{
    use HasFactory;

    protected $table = 'selectioncriterias';

    protected $fillable = [
        'id',
        'name'
    ];

    public function scholarships(): BelongsToMany {
        return $this->belongsToMany(Scholarship::class, 'selectioncriteria_scholarships',  'selectioncriteria_id', 'scholarship_id');
    }
}
