@extends('layouts/main')
            @section('content')
            <h1>Demande de contact</h1>
            
            <p>Voici les demandes de contacts effectuer :</p>
            <ul>
                @foreach ($contacts as $contact)
                    <li>{{ $contact->name }} a écrit : "{{$contact->message}}". Répondre à l'adresse : {{$contact->email}} .</li>
                @endforeach
            </ul>

@endsection