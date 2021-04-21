<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipes/single');
        // $comments = \App\Models\Comment::all(); //get all comments
        // return view('recipes/single', array(
        //     'comments' => $comments
        // ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('recipes/single');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request->url();
        echo $request;

        // Permet de vérifier les données donné en paramètre
        $validated = $request->validate([
            'content' => 'required|max:1000',
            'pseudo' => 'required|max:100'
        ]);

        // Permet l'ajout des données dans le tableau comments
        $recipe = \App\Models\Recipe::where('url', $request->url())->first();

        $comments = new Comment();
        $comments->author_id = $recipe->author_id; 
        $comments->recipe_id = $recipe->id;
        $comments->content = $validated['content'];
        $comments->pseudo = $validated['pseudo'];
        $comments->save();
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  
        //$comments = \App\Models\Comment::all(); //get all comments
        return view('recipes/single');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
