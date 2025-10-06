<div id="sidebar" class="bg-light border-end" style="width: 220px; min-height: 100vh; position: fixed;">
    <div class="sidebar-header p-3">
        <h5 class="text-primary">SPN</h5>
    </div>
    <ul class="nav flex-column">
        {{-- Tableau de bord --}}
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">🏠 Tableau de bord</a>
        </li>

        {{-- Archivage --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#archivesMenu" role="button"
               aria-expanded="false" aria-controls="archivesMenu">
                📑 Archivage
            </a>
            <div class="collapse" id="archivesMenu">
                <ul class="nav flex-column ms-3">
                    <li><a href="{{ route('archives.create') }}" class="nav-link">➕ Ajouter une Archive</a></li>
                    <li><a href="{{ route('archives.index') }}" class="nav-link">📂 Liste des Archives</a></li>
                </ul>
            </div>
        </li>

        {{-- Personnes --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#personnesMenu" role="button"
               aria-expanded="false" aria-controls="personnesMenu">
                👥 Personnes
            </a>
            <div class="collapse" id="personnesMenu">
                <ul class="nav flex-column ms-3">
                    <li><a href="{{ route('personnes.create') }}" class="nav-link">➕ Ajouter une Personne</a></li>
                    <li><a href="{{ route('personnes.index') }}" class="nav-link">📋 Liste des Personnes</a></li>
                </ul>
            </div>
        </li>

        {{-- Parcelles --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#parcellesMenu" role="button"
               aria-expanded="false" aria-controls="parcellesMenu">
                🏡 Parcelles
            </a>
            <div class="collapse" id="parcellesMenu">
                <ul class="nav flex-column ms-3">
                    <li><a href="{{ route('parcelles.create') }}" class="nav-link">➕ Ajouter une Parcelle</a></li>
                    <li><a href="{{ route('parcelles.index') }}" class="nav-link">📋 Liste des Parcelles</a></li>
                </ul>
            </div>
        </li>

        {{-- AutoBat --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#autobatMenu" role="button"
               aria-expanded="false" aria-controls="autobatMenu">
                🏢 AutoBat
            </a>
            <div class="collapse" id="autobatMenu">
                <ul class="nav flex-column ms-3">
                    <li><a href="{{ route('autobats.create') }}" class="nav-link">➕ Ajouter un AutoBat</a></li>
                    <li><a href="{{ route('autobats.index') }}" class="nav-link">📋 Liste des AutoBats</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
