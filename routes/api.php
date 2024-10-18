<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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

Route::group(['prefix' => 'type'], function (){
    Route::get('/', [PokemonController::class, 'showTypes']);
    Route::get('/{id}', [PokemonController::class, 'showTypesById']);
});

Route::group(['prefix' => 'item'], function (){
    Route::get('/', [PokemonController::class, 'showItems']);
    Route::get('/{id}', [PokemonController::class, 'showItemsById']);
});
