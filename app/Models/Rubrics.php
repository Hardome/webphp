<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rubrics extends Model
{
    use HasFactory;

    protected $table = 'rubrics';
    protected $guarded = ['id'];

    public function news():HasMany
    {
        return $this->hasMany(News::class, 'rubricsId', 'id');
    }
}
