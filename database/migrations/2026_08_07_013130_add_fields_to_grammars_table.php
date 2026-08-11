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
        Schema::table('grammars', function (Blueprint $table) {
            $table->text('structure')->nullable();
            $table->longText('rules')->nullable();
            $table->longText('usage_notes')->nullable();
            $table->longText('commonly_used_with')->nullable();
            $table->longText('common_mistakes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grammars', function (Blueprint $table) {
            //
        });
    }
};
