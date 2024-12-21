<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Move;
use App\Models\Type;
use App\Models\TypeInteraction;
use App\Models\Item;
use App\Models\PokemonEvolution;
use App\Models\PokemonVariety;
use App\Models\PokemonLearnMove;
use App\Models\Ability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::with(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types'])
                    ->paginate(20);
    }

    public function show(Pokemon $pokemon)
    {
        return $pokemon->load(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types']);
    }

    public function showVarieties(Pokemon $pokemon)
    {
        return $pokemon->varieties()->with(['sprites', 'types'])->get();
    }

    public function showMoves()
    {
        return Move::withTranslation()->get(['id', 'power', 'accuracy', 'pp', 'move_damage_class_id', 'priority', 'type_id']);
    }

    public function showMoveById($id)
    {
        return Move::withTranslation()
            ->where('id', $id)
            ->firstOrFail(['id', 'power', 'accuracy', 'pp', 'move_damage_class_id', 'priority', 'type_id']);
    }

    public function showPokemonLearnMoves()
    {
        $moves = PokemonLearnMove::with('move') // Charge la relation avec 'move'
            ->select(['id', 'pokemon_variety_id', 'move_id', 'move_learn_method_id', 'level', 'game_version_id'])
            ->get();

        return response()->json($moves);
    }

    

    public function showPokemonLearnMovesById($id)
    {
        $movesId = PokemonLearnMove::with('move')
            ->where('pokemon_variety_id', $id)
            ->groupBy('move_id')
            ->select(['id', 'pokemon_variety_id', 'move_id', 'move_learn_method_id', 'level', 'game_version_id'])
            ->get();
        
        return response()->json($movesId);

    }
    

    public function showTypes()
    {
        return Type::withTranslation()->get(['id', 'sprite_url']);
    }

    public function showTypesById($id)
    {
        return Type::withTranslation()
            ->where('id', $id)
            ->firstOrFail(['id', 'sprite_url']);
    }

    public function showTypesInteractions()
    {
        return TypeInteraction::get();
    }

    public function showTypesInteractionsById($id)
    {
        return TypeInteraction::with(['type', 'typecible', 'typeInteractionState'])
            ->where('from_type_id', $id)
            ->get();
    }

    public function showItems()
    {
        return Item::withTranslation()->get(['id', 'sprite_url']);
    }

    public function showItemsById($id)
    {
        return Item::withTranslation()
            ->where('id', $id)
            ->firstOrFail(['id', 'sprite_url']);
    }

    public function search(Request $request){
        return Pokemon::search($request->input('query'))
                      ->get()
                      ->load(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types']);
    }

    public function showEvolutions()
    {
        return PokemonEvolution::select(['id', 'pokemon_variety_id', 'evolves_to_id', 'gender', 'held_item_id', 'item_id', 'known_move_id', 'known_move_type_id', 'location', 'min_affection', 'min_happiness', 'min_level', 'needs_overworld_rain', 'party_species_id', 'party_type_id', 'relative_physical_stats', 'time_of_day', 'trade_species_id', 'turn_upside_down', 'evolution_trigger_id'])->get();
    }  

    public function showEvolutionsById($id){
        return PokemonEvolution::with([
            'pokemonVariety', 
            'pokemonVariety.sprites', 
            'evolvesTo', 
            'evolvesTo.sprites' 
        ])
            ->where('pokemon_variety_id', $id)
            ->firstOrFail(['id', 'pokemon_variety_id', 'evolves_to_id', 'gender', 'held_item_id', 'item_id', 'known_move_id', 'known_move_type_id', 'location', 'min_affection', 'min_happiness', 'min_level', 'needs_overworld_rain', 'party_species_id', 'party_type_id', 'relative_physical_stats', 'time_of_day', 'trade_species_id', 'turn_upside_down', 'evolution_trigger_id']);
    }

    public function showAbilities()
    {
        return Ability::withTranslation()
            ->first();

    }

    public function showAbilitiesByPokemonId($id)
    {
        $pokemon = PokemonVariety::with('abilities')->find($id);
    
        if (!$pokemon) {
            return response()->json(['message' => 'Pokemon not found'], 404);
        }
    
        return response()->json($pokemon->abilities);
    }
    

    public function showAbilityPokemonVarieties()
    {
        $data = DB::table('ability_pokemon_variety')->get();
        foreach ($data as $row) {
            return response()->json($data);
        }
    }  

    public function showAbilityPokemonVarietiesById($id)
    {
        $data = DB::table('ability_pokemon_variety')
        ->where('id', $id)
        ->firstOrFail(['id', 'name', 'description']);

        return response()->json($data); 
    }
    
}
