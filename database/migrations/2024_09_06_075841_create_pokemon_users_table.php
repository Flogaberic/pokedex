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
        Schema::create('pokemon_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\Pokemon::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(App\Models\User::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_users');
    }
};
