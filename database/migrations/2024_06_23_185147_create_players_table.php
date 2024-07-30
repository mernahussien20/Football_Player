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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('personal_image')->nullable();
            $table->string('birth_image')->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('birth_id')->constrained('births');
            $table->foreignId('role_id')->constrained('player_roles');
            $table->foreignId('branch_id')->constrained('branches');
            $table->string('governorate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
