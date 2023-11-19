<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'Person';
    protected $guarded = ['id'];

    public function Staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
