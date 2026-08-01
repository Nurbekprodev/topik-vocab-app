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
Schema::create('vocabulary_examples', function (Blueprint $table) {
    $table->id();

    $table->foreignId('vocabulary_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->text('korean_sentence');
    $table->text('english_translation');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabulary_examples');
    }
};
