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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Time');
            $table->string('YearS');
            $table->string('Movie');
            $table->string('img');
            $table->string('Imdb');
            $table->foreign('ages_id')->references('id')->on('ages');
            $table->unsignedBigInteger('ages_id');
            $table->foreign('directors_id')->references('id')->on('directors');
            $table->unsignedBigInteger('directors_id');
            $table->text('info');
            $table->integer('Favorite')->default(0);
            $table->boolean('Hot')->default(0);
            $table->boolean('is_Slid')->default(0);
            $table->timestamp('delete_at')->nullable();
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
