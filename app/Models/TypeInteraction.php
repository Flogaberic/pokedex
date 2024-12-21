<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInteraction extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class, 'from_type_id');
    }

    public function typecible()
    {
        return $this->belongsTo(Type::class, 'to_type_id');
    }

    public function typeInteractionState()
    {
        return $this->belongsTo(TypeInteractionState::class);
    }

}
