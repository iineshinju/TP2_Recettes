@extends('layouts/main')
            @section('content')
            <h1>Recettes</h1>
            <p>{{ $recipe->content }}</p>
            <p>{{$recipe->author->name}}</p>
@endsection