@extends('layouts/main')
            @section('content')
            <h1>Contact</h1>
            <!-- On crée un formulaire en post pour créer des contacts -->
            <form action="/contact" method="POST">
                @csrf
                <p>Votre nom</p>
                <input type="text" name="name" value="Nom">
                <p>Votre adresse email</p>
                <input type="email" name="email" value="Email">
                <p>Votre message</p>
                <textarea name="message" rows=5>Message</textarea>
                <input type="submit" value="Envoyer">
            </form>

@endsection