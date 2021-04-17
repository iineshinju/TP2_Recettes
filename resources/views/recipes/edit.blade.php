@extends('layouts/main')
            @section('content')
            <h1>Modifier une nouvelle recette</h1>
            <form action="{{'/admin/recettes/'.$recipe->title.'edit'}}" method="POST">
                @csrf
                <!-- @method('PUT') -->
                <p>Votre identification auteur</p>
                <input type="number" min=1 max=10 name="author_id" value="{{$recipe->author_id}}">
                <p>Le titre de votre recette</p>
                <input type="text" name="title" value="{{$recipe->title}}">
                <p>Les ingrédients de votre recette</p>
                <textarea name="ingredients" rows=5>{{$recipe->author_id}}</textarea>
                <p>Les étapes de la recettes</p>
                <textarea name="content" rows=5>{{$recipe->author_id}}</textarea>
                <p>Les tags de la recette</p>
                <input type="text" name="tags" value="{{$recipe->tags}}">
                <input type="submit" value="Modifier">
            </form>
            <form action="{{'/admin/recettes/'.$recipe->title.'delete'}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer">
            </form>

@endsection