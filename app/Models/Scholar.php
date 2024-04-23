<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Scholar extends Model
{
    use HasFactory;

    protected $fillable =[
      'id', 
      'application_id',
      'school',
      'parent_name',
      'parent_name2',
      'parent_email',
      'parent_email2',
      'graduation_year',
    ];

    public function applications() : HasOne {
        return $this->hasOne(Application::class);
    }
}
