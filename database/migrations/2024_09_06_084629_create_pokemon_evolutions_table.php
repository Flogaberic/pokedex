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
            $table->unsignedBigInteger('pokemon_variety_id');
            $table->unsignedBigInteger('evolves_to_id');
            $table->boolean('gender');
            $table->unsignedBigInteger('held_item_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('know_move_id');
            $table->unsignedBigInteger('know_move_type_id');
            $table->string('location');
            $table->integer('min_affection');
            $table->integer('min_happiness');
            $table->integer('min_level');
            $table->boolean('need_overworld_rain');
            $table->unsignedBigInteger('party_species_id');
            $table->unsignedBigInteger('party_type_id');
            $table->integer('relative_physical_stats');
            $table->string('time_of_day');
            $table->unsignedBigInteger('trade_species_id');
            $table->boolean('turn_upside_down');
            $table->unsignedBigInteger('evolution_trigger_id');
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
