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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('pass')->default(0);
            $table->tinyInteger('fail')->default(0);
            $table->tinyInteger('pending')->default(0);
            $table->foreignId('player_id')->constrained('players');
            $table->foreignId('exam_id')->constrained('exams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};

 