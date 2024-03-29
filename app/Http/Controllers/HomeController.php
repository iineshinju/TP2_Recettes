<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Création de la page index renvoyant toutes les recettes
    // function index() {
    //     //return view('welcome');
    //     $recipes = \App\Models\Recipe::all(); //get all recipes
        
    //     // Renvoie le tableau des recettes dans la vue welcome
    //     return view('welcome', array(
    //         'recipes' => $recipes
    //     ));
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Créer avec npm run dev
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // Créer avec npm run dev
    public function index()
    {
        return view('home');
    }
}
