@extends('layouts.app')

@section('content')
<div class="container">
    <h3>🏠 Détails Parcelle</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Numéro Police/SU :</strong> {{ $parcelle->numero_police }}</li>
        <li class="list-group-item"><strong>Superficie :</strong> {{ $parcelle->superficie }} m²</li>
        <li class="list-group-item"><strong>Ville :</strong> {{ $parcelle->ville }}</li>
        <li class="list-group-item"><strong>Lotissement :</strong> {{ $parcelle->lotissement }}</li>
        <li class="list-group-item"><strong>Coordonnées :</strong> {{ $parcelle->coordonnees }}</li>
        <li class="list-group-item"><strong>Propriétaire :</strong> {{ $parcelle->personne->nom ?? 'Non défini' }}</li>
    </ul>
</div>
@endsection
