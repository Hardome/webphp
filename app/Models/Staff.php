<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'Staff';
    protected $guarded = ['id'];

    public function Person():HasMany
    {
        return $this->hasMany(Person::class, 'Staff', 'id');
    }
}
