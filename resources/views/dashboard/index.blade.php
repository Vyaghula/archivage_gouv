@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">🏠 Tableau de bord</h3>

    <!-- Cartes Statistiques -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📂 Total Archives</h5>
                    <p class="fs-2">{{ $totalArchives }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📅 Aujourd’hui</h5>
                    <p class="fs-2">{{ $archivesToday }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📊 Ce mois</h5>
                    <p class="fs-2">{{ $archivesThisMonth }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphiques -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">📈 Archives par mois</div>
                <div class="card-body">
                    <canvas id="archivesByMonthChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">🏢 Archives par service</div>
                <div class="card-body">
                    <canvas id="archivesByServiceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">📂 Archives par catégorie</div>
                <div class="card-body">
                    <canvas id="archivesByCategorieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Archives par mois
    new Chart(document.getElementById('archivesByMonthChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(range(1, 12)) !!},
            datasets: [{
                label: 'Archives',
                data: {!! json_encode($archivesByMonth) !!},
                backgroundColor: '#6c63ff'
            }]
        }
    });

    // Archives par service
    new Chart(document.getElementById('archivesByServiceChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($archivesByService->keys()) !!},
            datasets: [{
                data: {!! json_encode($archivesByService->values()) !!},
                backgroundColor: ['#6c63ff','#28a745','#ffc107','#dc3545','#17a2b8']
            }]
        }
    });

    // Archives par catégorie
    new Chart(document.getElementById('archivesByCategorieChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($archivesByCategorie->keys()) !!},
            datasets: [{
                data: {!! json_encode($archivesByCategorie->values()) !!},
                backgroundColor: ['#ff6384','#36a2eb','#ffce56','#4bc0c0','#9966ff']
            }]
        }
    });
});
</script>
@endsection
