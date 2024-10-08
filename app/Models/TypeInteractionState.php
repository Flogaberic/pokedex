<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInteractionState extends Model
{
    use HasFactory;

    public function typeInteraction()
    {
        return $this->hasMany(TypeInteraction::class);
    }
}
