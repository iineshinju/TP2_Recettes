@extends('layouts/main')
            @section('content')
            <h1>Recettes</h1>
            <!-- On récupère le contenue de la recette -->
            <p>{{ $recipe->content }}</p>
            <!-- On récupère le nom de l'auteur de la recette -->
            <p>{{ $recipe->author->name }}</p>
@endsection