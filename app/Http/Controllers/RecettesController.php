<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Cree une fonction index
    function index() {
        // return view('recettes');
        $recipes = \App\Models\Recipe::all(); //get all recipes
        
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
        $validated = $request->validate([
            'author_id' => 'required',
            'title' => 'required|max:150',
            'content' => 'required',
            'ingredients' => 'required',
            'tags' => 'nullable',
        ]);

        DB::table('recipes')->insert([
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'ingredients' => $validated['ingredients'],
            'url' => "/recettes/".$validated['title'],
            'tags' => $validated['tags'],
            'status' => "Nouveau"
        ]);
        
        return redirect()->action([RecettesController::class, 'show'], ['recette' => $validated['title']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($recipe_name){
        $recipe = \App\Models\Recipe::where('title', $recipe_name)->first();
        //get first recipe with recipe name

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
    public function edit(Recipe $recipe)
    {
        return view('/recipes/edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'author_id' => 'required',
            'title' => 'required|max:150',
            'content' => 'required',
            'ingredients' => 'required',
            'tags' => 'nullable',
        ]);

        DB::table('recipes')->update([
            'author_id' => $validated['author_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'ingredients' => $validated['ingredients'],
            'url' => "/recettes/".$validated['title'],
            'tags' => $validated['tags'],
            'status' => "Mis à jour"
        ]);
        
        return redirect()->action([RecettesController::class, 'show'], ['recette' => $validated['title']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('/admin/recipes');
    }
}
