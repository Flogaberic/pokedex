<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Type extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public function pokemonEvolution()
    {
        return $this->hasMany(PokemonEvolution::class);
    }

    public function move()
    {
        return $this->hasMany(Move::class);
    }

    public function pokemonVariety()
    {
        return $this->belongsToMany(PokemonVariety::class);
    }
}
