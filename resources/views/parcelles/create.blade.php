@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">🏡 Ajouter une parcelle</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('parcelles.store') }}" method="POST">
                @csrf

                {{-- Sélection du propriétaire --}}
                <div class="mb-3">
                    <label for="personne_id" class="form-label">👤 Propriétaire</label>
                    <select name="personne_id" id="personne_id" class="form-control" required></select>
                </div>

                {{-- Champs de la parcelle --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Numéro Police / SU *</label>
                        <input type="text" name="numero_police" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Superficie (m²) *</label>
                        <input type="number" step="0.01" name="superficie" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ville *</label>
                        <input type="text" name="ville" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Lotissement</label>
                        <input type="text" name="lotissement" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Coordonnées (XY)</label>
                        <input type="text" name="coordonnees" class="form-control" placeholder="Ex : 29.1234, -1.6543">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">💾 Enregistrer</button>
                <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">↩ Retour</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#personne_id').select2({
            placeholder: '-- Sélectionner un propriétaire --',
            allowClear: true,
            ajax: {
                url: '{{ route('personnes.search') }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return { term: params.term };
                },
                processResults: function (data) {
                    return { results: data };
                },
                cache: true
            }
        });
    });
</script>
@endsection
