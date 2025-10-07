@extends('layouts.app')

@section('content')
<div class="container">
    <h3>🏢 Ajouter un AutoBat</h3>
    <form action="{{ route('autobats.store') }}" method="POST">
        @csrf
        <input type="text" name="nom_batiment" class="form-control mb-2" placeholder="Nom du bâtiment" required>
        <input type="text" name="adresse" class="form-control mb-2" placeholder="Adresse">
        <select name="personne_id" class="form-control mb-2" required>
            <option value="">-- Sélectionner le propriétaire --</option>
            @foreach($personnes as $personne)
                <option value="{{ $personne->id }}">{{ $personne->nom }} {{ $personne->postnom }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
