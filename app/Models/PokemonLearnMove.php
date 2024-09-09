<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PokemonLearnMove extends Model
{
    use HasFactory;

    public function pokemonVariety()
    {
      return $this->belongsTo(PokemonVariety::class);
    }

    public function move()
    {
      return $this->belongsTo(Move::class);
    }

    public function moveLearnMethod()
    {
      return $this->belongsTo(MoveLearnMethod::class);
    }

    public function gameVersion()
    {
      return $this->belongsTo(GameVersion::class);
    }
}
