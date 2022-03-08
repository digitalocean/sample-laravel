<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'title',
      'overview',
      'price'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
