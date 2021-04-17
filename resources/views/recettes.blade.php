@extends('layouts/main')
            @section('content')
            <h1>Recettes</h1>
            <h3>Liste des recettes</h3>
            <ul>
            @foreach ( $recipes as $recipe )
                <li> <a href="<?php echo "/recettes/".$recipe-> title ?>">{{ $recipe -> title}} </a> </li>
            @endforeach
            </ul>              
@endsection