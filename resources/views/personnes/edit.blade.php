@extends('layouts.app')

@section('content')
<div class="container">
    <h3>✏️ Modifier une personne</h3>
    <form action="{{ route('personnes.update', $personne) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nom" class="form-control mb-2" value="{{ $personne->nom }}" required>
        <input type="text" name="postnom" class="form-control mb-2" value="{{ $personne->postnom }}">
        <input type="text" name="prenom" class="form-control mb-2" value="{{ $personne->prenom }}">
        <input type="text" name="telephone" class="form-control mb-2" value="{{ $personne->telephone }}">
        <input type="text" name="adresse" class="form-control mb-2" value="{{ $personne->adresse }}">
        <input type="text" name="nationalite" class="form-control mb-2" value="{{ $personne->nationalite }}">
        <select name="genre" class="form-control mb-2">
            <option value="Homme" @if($personne->genre=='Homme') selected @endif>Homme</option>
            <option value="Femme" @if($personne->genre=='Femme') selected @endif>Femme</option>
        </select>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
