@extends('layouts/main')
            @section('content')
            <h1>Home</h1>
            <ul>
            <!--
            @foreach ( $recipes as $recipe )
               <li> <a href="<?php echo $recipe -> url ?>">{{ $recipe -> title}} </a> </li>
            @endforeach
            -->
            <!-- On veut récupérer les 3 dernières recettes -->
            @for($i = count($recipes)-1; $i > count($recipes)-4; $i--)
                <li> <a href="<?php echo "/recettes/".$recipes[$i]-> title ?>">{{ $recipes[$i] -> title}} </a> </li>
            @endfor
            </ul>
@endsection

