@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <!-- Ajout des liens pour les admins -->
                    <ul>
                        <li><a href="/admin/recettes">Voir toutes les recettes</a></li>
                        <li><a href="/admin/recettes/create">Créer une nouvelle recette</a></li>
                        <li><a href="/contact/all">Voir toutes les demandes de contacts</a></li>
        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
