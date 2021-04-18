<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Création de la table recipes
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->mediumText('title');
            $table->longText('content');
            $table->longText('ingredients');
            $table->string('url', 200);
            $table->text('tags')->nullable()->default(NULL);
            // default NULL permet de ne pas avoir d'erreur quand tag est vide
            //$table->dateTime('date');
            $table->string('status');
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
}
