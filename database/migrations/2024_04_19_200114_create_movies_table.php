<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('release_date');
            $table->integer('length')->comment('Length of the movie in minutes');
            $table->text('description');
            $table->string('mpaa_rating');
            $table->float('overall_rating')->default(0);
            $table->json('genres')->nullable()->comment('JSON array of genres');
            $table->json('performers')->nullable()->comment('JSON array of performers');
            $table->string('language')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
