<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'Staff';
    protected $guarded = ['id'];

    public function Person():BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }
}
