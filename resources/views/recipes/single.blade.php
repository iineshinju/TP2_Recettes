@extends('layouts/main')
            @section('content')
            <h1>Recettes</h1>
            <!-- Optionnel : On a ajouté le titre de la recette -->
            <h2>{{ $recipe->title }}</h2>
            <br> <!-- Saut de ligne -->
            <!-- Optionnel : On a ajouté la liste des ingrédients -->
            <h3>Ingrédients</h3>
            <p>{{ $recipe->content }}</p>
            
            <!-- On récupère le contenue de la recette -->
            <h3>Contenue</h3>
            <p>{{ $recipe->content }}</p>
            <!-- On récupère le nom de l'auteur de la recette -->
            <h5><em>{{ $recipe->author->name }}</em></h5>

            <!-- Optionnel : Formulaire de commentaires -->
            <br> <!-- Saut de ligne -->
            <h2>Commentaires</h2>
            <br> <!-- Saut de ligne -->
            <h5>Écrire un commentaire</h5>
            <form action="#" method="POST">
                <p>Votre pseudo</p>
                <input type="text" name="pseudo" value="Pseudo">
                <p>Votre commentaire</p>
                <textarea name="content" rows=5>Commentaire</textarea>
                <input type="submit" value="Commenter">
            </form>

            <!-- Optionnel : Affichage des commentaires -->
            <h5>Voir les anciens commentaires</h5>
            <!-- <ul>
                @foreach ($comments as $comment)
                    <li>{{ $comment->pseudo }} a écrit :".</li>
                    <dl>{{ $comment->email }} .</dl>
                @endforeach
            </ul> -->
@endsection