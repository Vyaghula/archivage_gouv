@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Ajouter une personne</h3>
    <div class="d-flex justify-content-between align-items-start" style="max-width: 600px;">
        <form action="{{ route('personnes.store') }}" method="POST" style="flex: 1;">
            @csrf
            <input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>
            <input type="text" name="postnom" class="form-control mb-2" placeholder="Postnom">
            <input type="text" name="prenom" class="form-control mb-2" placeholder="Prénom">
            <input type="text" name="telephone" class="form-control mb-2" placeholder="Téléphone">
            <input type="text" name="adresse" class="form-control mb-2" placeholder="Adresse">
            <input type="text" name="nationalite" class="form-control mb-2" placeholder="Nationalité">
            <select name="genre" class="form-control mb-2">
                <option value="">-- Genre --</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
            <button class="btn btn-success">Enregistrer</button>
        </form>
        <a href="{{ route('personnes.index') }}" class="btn btn-primary ms-3" style="height: 40px; align-self: start;">
            Liste des personnes
        </a>
    </div>
</div>
@endsection
