<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Move extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];

    public function pokemonEvolution()
    {
      return $this->hasMany(PokemonEvolution::class);
    }

    public function pokemonLearnMove()
    {
      return $this->hasMany(PokemonLearnMove::class);
    }

    public function moveDamageClass()
    {
      return $this->belongsTo(MoveDamageClass::class);
    }

    public function type()
    {
      return $this->belongsTo(Type::class);
    }
}
