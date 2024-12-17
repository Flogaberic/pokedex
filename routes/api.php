<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\Auth\OAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::get('/redirect', [OAuthController::class, 'redirect']);
    Route::get('/callback', [OAuthController::class, 'callback']);
    Route::middleware('auth:sanctum')->post('/logout', [OAuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
      return $request->user();
    });
  
    // Vos autres routes protégées ici...

    Route::group(['prefix' => 'pokemon'], function (){
        Route::get('/', [PokemonController::class, 'index']);
        Route::get('/search', [PokemonController::class, 'search']);
        Route::get('/{pokemon}', [PokemonController::class, 'show']);
        Route::get('/{pokemon}/varieties', [PokemonController::class, 'showVarieties']);
    });

    Route::group(['prefix' => 'move'], function (){
        Route::get('/', [PokemonController::class, 'showMoves']);
        Route::get('/{id}', [PokemonController::class, 'showMoveById']);
    });

    Route::group(['prefix' => 'ability'], function (){
        Route::get('/', [PokemonController::class, 'showAbilities']);
        Route::get('/{id}', [PokemonController::class, 'showAbilitiesByPokemonId']);
    });

    Route::group(['prefix' => 'abilityPokemonVariety'], function (){
        Route::get('/', [PokemonController::class, 'showAbilityPokemonVarieties']);
        Route::get('/{id}', [PokemonController::class, 'showAbilityPokemonVarietiesById']);
    });

    Route::group(['prefix' => 'evolutions'], function (){
        Route::get('/', [PokemonController::class, 'showEvolutions']);
        Route::get('/{id}', [PokemonController::class, 'showEvolutionsById']);
    });
    
    Route::group(['prefix' => 'type'], function (){
        Route::get('/', [PokemonController::class, 'showTypes']);
        Route::get('/{id}', [PokemonController::class, 'showTypesById']);
    });

    Route::group(['prefix' => 'type_interactions'], function (){
        Route::get('/', [PokemonController::class, 'showTypesInteractions']);
        Route::get('/{id}', [PokemonController::class, 'showTypesInteractionsyId']);
    });
    
    Route::group(['prefix' => 'item'], function (){
        Route::get('/', [PokemonController::class, 'showItems']);
        Route::get('/{id}', [PokemonController::class, 'showItemsById']);
    });
});