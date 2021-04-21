@extends('layouts/main')
            @section('content')
            <h1>Modifier votre recette</h1>
            <!-- On crée un formulaire en post pour modifier les recettes déjà existente -->
            <!-- Optionnel : Ajout de enctype pour l'image  -->
            <form action="{{'/admin/recettes/'.$recipe->title}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p>Le titre de votre recette</p>
                <input type="text" name="title" value="{{$recipe->title}}">
                <p>Les ingrédients de votre recette</p>
                <textarea name="ingredients" rows=5>{{$recipe->ingredients}}</textarea>
                <p>Les étapes de la recette</p>
                <textarea name="content" rows=5>{{$recipe->content}}</textarea>
                <p>Les tags de la recette</p>
                <input type="text" name="tags" value="{{$recipe->tags}}">
                <!-- Optionnel : Téléchargement des images -->
                <input type="file" name="image" id="file_image">
                <input type="submit" value="Modifier">
            </form>
            <!-- Optionnel : ajout d'un bouton qui retourne à la page recette -->
            <a href="<?php echo 'http://localhost:8000/admin/recettes/'.$recipe->title ?>">Retour</a>
            <!-- On ajoute un bouton avec la méthode delete pour pouvoir supprimer la recette -->
            <form action="{{'/admin/recettes/'.$recipe->title}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer">
            </form>

@endsection