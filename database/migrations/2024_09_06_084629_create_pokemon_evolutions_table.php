<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_evolutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\PokemonVariety::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\PokemonVariety::class, 'evolves_to_id')->constrained()->onDelete('cascade');
            $table->boolean('gender');
            $table->foreignIdFor(App\Models\Item::class, 'held_item_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Item::class, 'item_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Move::class, 'known_move')->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Type::class, 'known_move_type_id')->constrained()->onDelete('cascade');
            $table->string('location');
            $table->integer('min_affection');
            $table->integer('min_happiness');
            $table->integer('min_level');
            $table->boolean('need_overworld_rain');
            $table->foreignIdFor(App\Models\Pokemon::class, 'party_species_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Type::class, 'party_type_id')->constrained()->onDelete('cascade');
            $table->integer('relative_physical_stats');
            $table->string('time_of_day');
            $table->unsignedBigInteger('trade_species_id');
            $table->foreignIdFor(App\Models\Pokemon::class, 'trade_species_id')->constrained()->onDelete('cascade');
            $table->boolean('turn_upside_down');
            $table->foreignIdFor(App\Models\EvolutionTrigger::class)->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_evolutions');
    }
};
