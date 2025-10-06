@extends('layouts.app')

@section('content')
<div class="container">
    <h3>👥 Liste des personnes</h3>
    <a href="{{ route('personnes.create') }}" class="btn btn-primary mb-3">➕ Ajouter une personne</a>

    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Postnom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Nationalité</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        @foreach($personnes as $personne)
        <tr>
            <td>{{ $personne->nom }}</td>
            <td>{{ $personne->postnom }}</td>
            <td>{{ $personne->prenom }}</td>
            <td>{{ $personne->telephone }}</td>
            <td>{{ $personne->adresse }}</td>
            <td>{{ $personne->nationalite }}</td>
            <td>{{ $personne->genre }}</td>
            <td>
                <a href="{{ route('personnes.show', $personne) }}" class="btn btn-info btn-sm">👁</a>
                <a href="{{ route('personnes.edit', $personne) }}" class="btn btn-warning btn-sm">✏️</a>
                <form action="{{ route('personnes.destroy', $personne) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $personnes->links() }}
</div>
@endsection
