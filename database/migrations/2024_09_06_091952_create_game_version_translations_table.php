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
        Schema::create('game_version_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\GameVersion::class)->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_version_translations');
    }
};
