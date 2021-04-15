<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecettesController extends Controller
{
    //
    function index() {
        return view('recettes');
    }

    public function show($recipe_name){
        $recipe = \App\Models\Recipe::where('title', $recipe_name)->first(); //get first recipe with recipe name

        return view('recipes/single', array(
            //Pass the recipe to the view
            'recipe' => $recipe
        ));


    }
}
