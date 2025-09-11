<div id="sidebar" class="bg-light border-end" style="width: 220px; min-height: 100vh; position: fixed;">
    <div class="sidebar-header p-3">
        <h5 class="text-primary"> SPN</h5>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">🏠 Tableau de bord</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#archivesMenu" role="button" aria-expanded="false" aria-controls="archivesMenu">
                📑 Archivage
            </a>
            <div class="collapse" id="archivesMenu">
                <ul class="nav flex-column ms-3">
                   <li><a href="{{ route('archives.create') }}" class="nav-link">➕ Ajouter une Archive</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">📊 Rapports</a>
        </li>
    </ul>
</div>
