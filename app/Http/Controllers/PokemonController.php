<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Move;
use App\Models\Type;
use App\Models\Item;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::with(['defaultVariety', 'defaultVariety.sprites'])
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
    
    
}
