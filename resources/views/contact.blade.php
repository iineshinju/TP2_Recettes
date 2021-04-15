@extends('layouts/main')
            @section('content')
            <h1>Contact</h1>
            <form action="/contact" method="POST">
                @csrf
                <input type="text" name="name" value="Votre nom">
                <input type="email" name="email" value="Votre email">
                <textarea name="message" rows=5>Votre message</textarea>
                <input type="submit" value="Envoyer">
            </form>

            <!-- <ul>
                @foreach ($contacts as $contact)
                    <li>{{ $contact->name }} a écrit : "{{$contact->message}}". Répondre à {{$contact->email}}</li>
                @endforeach
            </ul> -->

@endsection