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
        Schema::create('movie_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('movie_title');
            $table->string('username');
            $table->unsignedInteger('rating');
            $table->text('r_description')->nullable();
            $table->timestamps();

            // Define unique constraint to ensure a user can only rate a movie once
            $table->unique(['movie_title', 'username']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_ratings');
    }
};
