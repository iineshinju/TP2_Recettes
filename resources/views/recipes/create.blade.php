@extends('layouts/main')
            @section('content')
            <h1>Ajouter une nouvelle recette</h1>
            <!-- On crée un formulaire en post pour créer de nouvelles recettes -->
            <form action="/admin/recettes" method="POST">
                @csrf
                <p>Votre identification d'auteur</p>
                <!-- On a min = 1 et max = 10 car on a que 10 auteurs -->
                <input type="number" min=1 max=10 name="author_id">
                <p>Le titre de votre recette</p>
                <input type="text" name="title" value="Titre">
                <p>Les ingrédients de votre recette</p>
                <textarea name="ingredients" rows=5>Ingrédient</textarea>
                <p>Les étapes de la recette</p>
                <textarea name="content" rows=5>Recette</textarea>
                <p>Les tags de la recette</p>
                <input type="text" name="tags">
                <input type="submit" value="Créer">
            </form>

@endsection