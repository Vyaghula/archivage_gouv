@extends('layouts.app')

@section('content')
<div class="container">
    <h3>🏘 Liste des Parcelles</h3>
    <a href="{{ route('parcelles.create') }}" class="btn btn-primary mb-3">➕ Ajouter une parcelle</a>

    <table class="table table-bordered">
        <tr>
            <th>Numéro Police/SU</th>
            <th>Superficie</th>
            <th>Ville</th>
            <th>Lotissement</th>
            <th>Coordonnées</th>
            <th>Propriétaire</th>
            <th>Actions</th>
        </tr>
        @foreach($parcelles as $parcelle)
        <tr>
            <td>{{ $parcelle->numero_police }}</td>
            <td>{{ $parcelle->superficie }}</td>
            <td>{{ $parcelle->ville }}</td>
            <td>{{ $parcelle->lotissement }}</td>
            <td>{{ $parcelle->coordonnees }}</td>
            <td>{{ $parcelle->personne?->nom ?? 'Non défini' }}</td>
            <td>
                <a href="{{ route('parcelles.show', $parcelle) }}" class="btn btn-info btn-sm">👁</a>
                <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-warning btn-sm">✏️</a>
                <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $parcelles->links() }}
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>🏘 Liste des Parcelles</h3>
    <a href="{{ route('parcelles.create') }}" class="btn btn-primary mb-3">➕ Ajouter une parcelle</a>

    <table class="table table-bordered">
        <tr>
            <th>Numéro Police/SU</th>
            <th>Superficie</th>
            <th>Ville</th>
            <th>Lotissement</th>
            <th>Coordonnées</th>
            <th>Propriétaire</th>
            <th>Actions</th>
        </tr>
        @foreach($parcelles as $parcelle)
        <tr>
            <td>{{ $parcelle->numero_police }}</td>
            <td>{{ $parcelle->superficie }}</td>
            <td>{{ $parcelle->ville }}</td>
            <td>{{ $parcelle->lotissement }}</td>
            <td>{{ $parcelle->coordonnees }}</td>
            <td>{{ $parcelle->personne?->nom ?? 'Non défini' }}</td>
            <td>
                <a href="{{ route('parcelles.show', $parcelle) }}" class="btn btn-info btn-sm">👁</a>
                <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-warning btn-sm">✏️</a>
                <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $parcelles->links() }}
</div>
@endsection
