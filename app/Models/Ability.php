<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ability extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];

    public function pokemonVarieties()
    {
      return $this->belongsToMany(PokemonVariety::class, 'ability_pokemon_variety')
                  ->withPivot('is_hidden', 'slot')
                  ->withTimestamps();
    }
}
