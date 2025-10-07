<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- 🔹 Styles externes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- 🔹 jQuery & Select2 (avant yield scripts) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y4h3fZ+6qF4u5r8qfL1x2k6Kp0f0g1c4jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #ddd;
        }

        .sidebar .nav-link.active {
            background-color: #6c63ff;
            color: #fff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="app" class="d-flex">
        {{-- Sidebar --}}
        <nav class="sidebar bg-dark p-3 position-fixed">
            <h4 class="text-white mb-4">📂 SPN</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        🏠 Tableau de bord
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#archivesMenu" role="button">
                        📑 Archivage
                    </a>
                    <div class="collapse {{ request()->is('archives*') ? 'show' : '' }}" id="archivesMenu">
                        <ul class="nav flex-column ms-3">
                            <li><a href="{{ route('archives.create') }}" class="nav-link text-white">➕ Ajouter</a></li>
                            <li><a href="{{ route('archives.index') }}" class="nav-link text-white">📋 Liste</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="{{ route('personnes.create') }}" class="nav-link text-white">👥 Personne</a></li>
                <li><a href="{{ route('parcelles.create') }}" class="nav-link text-white">🏘 Parcelle</a></li>
                <li><a href="#" class="nav-link text-white">🏢 AutoBat</a></li>
                <li><a href="#" class="nav-link text-white">📊 Rapports</a></li>
            </ul>
        </nav>

        {{-- Content --}}
        <div class="content flex-grow-1">
            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid">
                    <div class="ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="btn btn-outline-success" href="{{ route('register') }}">Register</a>
                            @endif
                        @else
                            <div class="dropdown">
                                <a class="btn btn-outline-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            🚪 Déconnexion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>

            {{-- Main Content --}}
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- 🔹 Scripts Bootstrap & Dropzone -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <!-- 🔹 Scripts spécifiques aux pages -->
    @yield('scripts')
</body>
</html>
