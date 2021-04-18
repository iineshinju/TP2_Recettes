<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index() {
        //return view('welcome');
        $recipes = \App\Models\Recipe::all(); //get all recipes
        
        // Renvoie le tableau des recettes dans la vue welcome
        return view('welcome', array(
            'recipes' => $recipes
        ));
    }
}
