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
        Schema::create('moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('accuracy');
            $table->foreignIdFor(App\Models\MoveDamageClass::class)->constrained()->onDelete('cascade');
            $table->integer('power');
            $table->integer('pp');
            $table->integer('priority');
            $table->foreignIdFor(App\Models\Type::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moves');
    }
};
