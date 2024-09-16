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
        Schema::create('pokemon_learn_moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\PokemonVariety::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\Move::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\MoveLearnMethod::class)->constrained()->onDelete('cascade');
            $table->integer('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_learn_moves');
    }
};
