@extends('layouts.app')

@section('content')
<div class="container">
    <h3>👤 Détails Personne</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ $personne->nom }}</li>
        <li class="list-group-item"><strong>Postnom :</strong> {{ $personne->postnom }}</li>
        <li class="list-group-item"><strong>Prénom :</strong> {{ $personne->prenom }}</li>
        <li class="list-group-item"><strong>Téléphone :</strong> {{ $personne->telephone }}</li>
        <li class="list-group-item"><strong>Adresse :</strong> {{ $personne->adresse }}</li>
        <li class="list-group-item"><strong>Nationalité :</strong> {{ $personne->nationalite }}</li>
        <li class="list-group-item"><strong>Genre :</strong> {{ $personne->genre }}</li>
    </ul>
</div>
@endsection
