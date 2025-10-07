@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">👤 Ajouter une personne</h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('personnes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nom *</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Post-nom</label>
                            <input type="text" name="postnom" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="text" name="telephone" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nationalité</label>
                            <input type="text" name="nationalite" class="form-control" value="Congolaise">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Genre *</label>
                            <select name="genre" class="form-control" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3 d-flex align-items-end" style="margin-top: 32px;">
                            <a href="{{ route('personnes.index') }}" class="btn btn-primary ms-3" style="height: 40px;">
                                Liste des personnes
                            </a>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success mt-3">💾 Enregistrer</button>
                    <a href="{{ route('personnes.index') }}" class="btn btn-secondary mt-3">↩ Retour</a>
                </form>
            </div>
        </div>
    </div>
@endsection
