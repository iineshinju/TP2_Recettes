<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Carbon permet d'avoir le current timestamp (vu sur stackoverflow)
use Carbon\Carbon;

// CRUD de RecettesController lié au model Recipe
class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Crée une fonction index
    function index() {
        // return view('recettes');
        // Récupére toutes les recettes dans la variable $recipes
        $recipes = \App\Models\Recipe::all(); //get all recipes
        
        // Renvoie le tableau des recettes dans la vue recettes
        return view('recettes', array(
            'recipes' => $recipes
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Renvoie à la vue pour créer les recettes par un formulaire
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Permet de vérifier les données donné en paramètre
        $validated = $request->validate([
            'author_id' => 'required',
            'title' => 'required|max:150',
            'content' => 'required',
            'ingredients' => 'required',
            'tags' => 'nullable',
            // Optionnel : ajout de l'image de maximum 5000 avec sometimes
            'image' => 'sometimes|image|max:5000'
        ]);

        // Permet l'ajout des données dans le tableau recipes
        DB::table('recipes')->insert([
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'ingredients' => $validated['ingredients'],
            'url' => "/recettes/".$validated['title'],
            'tags' => $validated['tags'],
            'status' => "Nouveau",
            // Carbon::now vu sur stackoverflow
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            // Optionnel : Ajout de l'image dans la base
            'image' => NULL,
            //'image' => $validated['image']->store('recettes', 'public'),
        ]);

        // Optionnel : Ajout de l'image dans la base
        if (!empty($validated['image'])){
            DB::table('recipes')->update([
                'image' => $validated['image']->store('recettes', 'public'),
            ]);
        }

        // Redirige vers l'action show de ce controller à la page contenant le titre de la recette
        return redirect()->action([RecettesController::class, 'show'], ['recette' => $validated['title']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_name){
        // On récupére la recette correspondant au titre donnée en paramètre
        $recipe = \App\Models\Recipe::where('title', $recipe_name)->first();
        //get first recipe with recipe name

        // Renvoie un tableau à la vue single de recipes
        return view('recipes/single', array(
            //Pass the recipe to the view
            'recipe' => $recipe
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    // Le paramètre est le titre, car donner dans l'url à la place
    public function edit($title)
    {
        // Récupére à partir du titre la recette
        $recipe = \App\Models\Recipe::where('title', $title)->first();
        // echo $recipe;
        // Renvoie à la vue pour éditer la recette entrée en paramètre
        return view('/recipes/edit', array(
            //Pass the recipe to the view
            'recipe' => $recipe
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $title)
    {
        $recipe = \App\Models\Recipe::where('title', $title)->first();
        echo $recipe;
        // Vérifie qu'après changement les données sont toujours valide
        $validated = $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'ingredients' => 'required',
            'tags' => 'nullable',
            // Optionnel : ajout de l'image de maximum 5000 avec sometimes
            'image' => 'sometimes|image|max:5000'
        ]);

        // Mets à jour la table de la recette
        $recipe->title = $validated['title'];
        $recipe->content = $validated['content'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->tags = $validated['tags'];
        $recipe->status = "Mis à jour";
        
        // Carbon::now vu sur stackoverflow
        $recipe->updated_at = Carbon::now()->toDateTimeString();
        // Optionnel : Ajout de l'image dans la base
        if (request('image')){
            $recipe->image = $validated['image']->store('recettes', 'public');
        }

        $recipe->save();
        // Redirige vers l'action show de ce controller à la page contenant le titre de la recette
        return redirect()->action([RecettesController::class, 'show'], ['recette' => $validated['title']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        //Récupération de la recette à partir du titre
        $recipe = \App\Models\Recipe::where('title', $title)->first();
        // Supprime la recette
        $recipe->delete();
        // Renvoie à la route admin recipes
        return redirect('/admin/recettes');
    }

}
