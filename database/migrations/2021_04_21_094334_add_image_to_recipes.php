<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToRecipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Permet l'ajout de l'attribut image dans la base de données dans la table recipes
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->string('image')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            //
        });
    }
}
