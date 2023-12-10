<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Creativity extends Model
{
    use HasFactory;

    protected $table = 'creativity';
    protected $guarded = ['id'];

    public function master_classes():HasMany
    {
        return $this->hasMany(MasterClass::class, 'creativityId', 'id');
    }
}
