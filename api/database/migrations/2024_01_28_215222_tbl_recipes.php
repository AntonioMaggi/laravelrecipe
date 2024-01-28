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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipeTitle');
            $table->text('description');
            $table->json('ingredients');
            $table->json('instructions');
            $table->integer('prepTime');
            $table->integer('cookingTime');
            $table->string('difficultyLevel');
            // Add any other columns you need for the recipes table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
