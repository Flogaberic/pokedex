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
        Schema::create('ability_pokemon_varieties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('ability_id')->constrained()->onDelete('cascade');
            $table->foreignId('pokemon_variety_id')->constrained()->onDelete('cascade');
            $table->boolean('id_hidden');
            $table->integer('slot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_pokemon_varieties');
    }
};
