@extends('layouts/main')
            @section('content')
            <h1>Recettes</h1>
            <!-- Optionnel : On ajoute l'image ajouté -->
            @if ($recipe->image != NULL)
                <img src="{{asset('storage/'.$recipe->image)}}" alt="Image recette" width= 200>
            @endif
            <!-- Optionnel : On a ajouté le titre de la recette -->
            <h2>{{ $recipe->title }}</h2>
            <br> <!-- Saut de ligne -->
            <!-- Optionnel : On a ajouté la liste des ingrédients -->
            <h3>Ingrédients</h3>
            <p>{{ $recipe->ingredients }}</p>
            
            <!-- On récupère le contenue de la recette -->
            <h3>Contenue</h3>
            <p>{{ $recipe->content }}</p>
            <!-- On récupère le nom de l'auteur de la recette -->
            <h5><em>{{ $recipe->author->name }}</em></h5>
            <!-- Optionnel : Bouton modifier la recette -->
            <br> <!-- Saut de ligne -->
            <a href="<?php echo 'http://localhost:8000/admin/recettes/'.$recipe->title ?>/edit">Modifier</a>

            <!-- Optionnel : Formulaire de commentaires -->
            <br> <!-- Saut de ligne -->
            <h2>Commentaires</h2>
            <br> <!-- Saut de ligne -->
            <h5>Écrire un commentaire</h5>
            <form action="{{'/admin/recettes/'.$recipe->title}}" method="POST">
                <p>Votre pseudo</p>
                <input type="text" name="pseudo" value="Pseudo">
                <p>Votre commentaire</p>
                <textarea name="content" rows=5>Commentaire</textarea>
                <input type="submit" value="Commenter">
            </form>

        
            <!-- Optionnel : Affichage des commentaires -->
            <br> <!-- Saut de ligne -->
            <h5>Voir les anciens commentaires</h5>
            <br> <!-- Saut de ligne -->
            @if (!empty($comments))
                @foreach ($comments as $comment)
                    <li>{{ $comment->pseudo }} a écrit :</li>
                        <dl>{{$comment->content}}.</dl>
                @endforeach
            @endif
            
@endsection