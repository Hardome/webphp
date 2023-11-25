<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = ['id'];

    public function rubric(): HasOne
    {
        return $this->hasOne(Rubrics::class, 'id', 'rubricsId');
    }
}
