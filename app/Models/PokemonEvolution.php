<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonEvolution extends Model
{
    use HasFactory;

    public $translatedAttributes = ['name', 'form_name', 'description'];

    public function pokemonVariety()
    {
      return $this->belongsTo(PokemonVariety::class);
    }

    public function item()
    {
      return $this->belongsTo(Item::class);
    }

    public function move()
    {
      return $this->belongsTo(Move::class);
    }

    public function type()
    {
      return $this->belongsTo(Type::class);
    }

    public function pokemon()
    {
      return $this->belongsTo(Pokemon::class);
    }

    public function evolutionTrigger()
    {
      return $this->belongsTo(EvolutionTrigger::class);
    }
}
