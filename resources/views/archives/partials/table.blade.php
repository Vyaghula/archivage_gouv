<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Service</th>
            <th>Fichier</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($archives as $archive)
        <tr>
            <td>{{ $archive->titre }}</td>
            <td>{{ $archive->categorie }}</td>
            <td>{{ $archive->service }}</td>
            <td><a href="{{ asset('storage/'.$archive->fichier) }}" target="_blank" class="btn btn-sm btn-outline-primary">📥 Télécharger</a></td>
            <td>{{ $archive->created_at->format('d/m/Y') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">Aucun fichier trouvé</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $archives->links() }}
</div>
