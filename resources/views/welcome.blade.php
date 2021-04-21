@extends('layouts/main')
            @section('content')
            <h1>Home</h1>
            <ul>
            <!--
            @foreach ( $recipes as $recipe )
               <li> <a href="<?php echo $recipe -> url ?>">{{ $recipe -> title}} </a> </li>
            @endforeach
            -->
            <!-- Optionnel : Donne un titre à la page d'accueil -->
            <h3>Les trois dernières recettes de notre site</h3>
            <!-- On veut récupérer les 3 dernières recettes -->
            @for($i = count($recipes)-1; $i > count($recipes)-4; $i--)
                <li> <a href="<?php echo "/recettes/".$recipes[$i]-> title ?>">{{ $recipes[$i] -> title}} </a> </li>
            @endfor
            </ul>
@endsection

