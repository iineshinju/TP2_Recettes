@extends('layouts/main')
            @section('content')
            <h1>Ajouter une nouvelle recette</h1>
            <form action="/admin/recettes" method="POST">
                @csrf
                <p>Votre identification d'auteur</p>
                <input type="number" min=1 name="author_id">
                <p>Le titre de votre recette</p>
                <input type="text" name="title" value="Titre">
                <p>Les ingrédients de votre recette</p>
                <textarea name="ingredients" rows=5>Ingrédient</textarea>
                <p>Les étapes de la recettes</p>
                <textarea name="content" rows=5>Recette</textarea>
                <p>Les tags de la recette</p>
                <input type="text" name="tags">
                <input type="submit" value="Envoyer">
            </form>

@endsection