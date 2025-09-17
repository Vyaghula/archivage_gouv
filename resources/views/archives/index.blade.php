@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Liste des archives</h3>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('archives.create') }}" class="btn btn-primary">➕ Ajouter une archive</a>
            <!-- Zone de recherche -->
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un fichier..."
                style="max-width: 300px; border-color: #720fd5; color: #28a745;">
            </div>

        <div id="archivesTable">
            @include('archives.partials.table', ['archives' => $archives])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
                    const searchInput = document.getElementById("searchInput");

                    searchInput.addEventListener("keyup", function() {
                        let query = this.value;

                        fetch("{{ route('archives.index') }}?search=" + encodeURIComponent(query), {
                                headers: {
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            })
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById("archivesTable").innerHTML = data;
                            })
                            .catch(err => console.error(err));
                        this.on("error", function(file, response) {
                            if (response.error) {
                                alert(response.error); // ou afficher dans ton panneau
                            }


                        });

                        // Gestion pagination AJAX
                        document.addEventListener("click", function(e) {
                            if (e.target.closest(".pagination a")) {
                                e.preventDefault();
                                let url = e.target.closest("a").getAttribute("href");

                                fetch(url, {
                                        headers: {
                                            "X-Requested-With": "XMLHttpRequest"
                                        }
                                    })
                                    .then(response => response.text())
                                    .then(data => {
                                        document.getElementById("archivesTable").innerHTML = data;
                                    });
                            }
                        });
                    });
    </script>
@endsection
