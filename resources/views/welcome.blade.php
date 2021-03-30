@extends('layouts/main')
            @section('content')
            <h1>Home</h1>
            <ul>
            <!--
            @foreach ( $recipes as $recipe )
               <li> <a href="<?php echo $recipe -> url ?>">{{ $recipe -> title}} </a> </li>
            @endforeach
            -->
            @for($i = count($recipes)-1; $i > count($recipes)-4; $i--)
                <li> <a href="<?php echo $recipes[$i] -> url ?>">{{ $recipes[$i] -> title}} </a> </li>
            @endfor
            </ul>
@endsection

