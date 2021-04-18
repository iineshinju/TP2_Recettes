@extends('layouts/main')
            @section('content')
            <h1>Modifier votre recette</h1>
            <!-- On crée un formulaire en post pour modifier les recettes déjà existente -->
            <form action="{{'/admin/recettes/'.$recipe->title}}" method="POST">
                @csrf
                <!-- @method('PUT') -->
                <p>Le titre de votre recette</p>
                <input type="text" name="title" value="{{$recipe->title}}">
                <p>Les ingrédients de votre recette</p>
                <textarea name="ingredients" rows=5>{{$recipe->author_id}}</textarea>
                <p>Les étapes de la recette</p>
                <textarea name="content" rows=5>{{$recipe->author_id}}</textarea>
                <p>Les tags de la recette</p>
                <input type="text" name="tags" value="{{$recipe->tags}}">
                <input type="submit" value="Modifier">
            </form>
            <!-- On ajoute un bouton avec la méthode delete pour pouvoir supprimer la recette -->
            <form action="{{'/admin/recettes/'.$recipe->title.'delete'}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer">
            </form>

@endsection