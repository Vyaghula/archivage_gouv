@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">📂 Archivage des fichiers</h3>

        <div class="row">
            {{-- Zone Dropzone --}}
            <div class="col-md-8">
                <form action="{{ route('archives.upload') }}" method="POST" class="dropzone dz-custom" id="my-dropzone"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="dz-message">
                        <h4 class="text-muted">GLISSEZ & DEPOSEZ VOS FICHIERS ICI</h4>
                        <p class="mt-2">ou</p>
                        <button type="button" class="btn btn-primary">parcourir les fichiers</button>
                    </div>
                </form>
            </div>

            {{-- Panneau progression --}}
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h6 class="mb-0">📋 Liste des fichiers</h6>
                        <a href="{{ route('archives.index') }}" class="btn btn-sm btn-primary">
                            Voir la Liste des fichiers
                        </a>
                    </div>
                    <div class="card-body" id="file-progress-list" style="max-height: 350px; overflow-y: auto;">
                        <p class="text-muted">Aucun fichier pour le moment...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Styles personnalisés --}}
    <style>
        .dz-custom {
            border: 2px dashed #6c63ff;
            border-radius: 12px;
            background: #f9f9ff;
            padding: 60px;
            text-align: center;
            transition: background 0.3s ease-in-out;
        }

        .dz-custom:hover {
            background: #f0f0ff;
        }

        .dz-custom .dz-message h4 {
            font-weight: bold;
            color: #6c63ff;
        }

        .dz-custom .btn {
            margin-top: 15px;
            background-color: #6c63ff;
            border: none;
        }
    </style>

    {{-- Dropzone config --}}
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: true,
            paramName: "file",
            maxFilesize: 20, // MB
            acceptedFiles: ".pdf,.doc,.docx,.jpg,.png",
            addRemoveLinks: true,

            init: function() {
                this.on("addedfile", function(file) {
                    let fileList = document.getElementById("file-progress-list");

                    if (fileList.querySelector("p")) {
                        fileList.innerHTML = "";
                    }

                    let fileBlock = document.createElement("div");
                    fileBlock.classList.add("mb-3");
                    fileBlock.innerHTML = `
                        <strong>${file.name}</strong>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                 role="progressbar" style="width: 0%"></div>
                        </div>
                    `;
                    file.previewElement.fileBlock = fileBlock;
                    fileList.appendChild(fileBlock);
                });

                this.on("uploadprogress", function(file, progress) {
                    if (file.previewElement.fileBlock) {
                        let progressBar = file.previewElement.fileBlock.querySelector(".progress-bar");
                        progressBar.style.width = progress + "%";
                    }
                });

                this.on("success", function(file) {
                    if (file.previewElement.fileBlock) {
                        let progressBar = file.previewElement.fileBlock.querySelector(".progress-bar");
                        progressBar.classList.remove("bg-primary");
                        progressBar.classList.add("bg-success");
                        progressBar.style.width = "100%";
                    }
                });

                this.on("error", function(file) {
                    if (file.previewElement.fileBlock) {
                        let progressBar = file.previewElement.fileBlock.querySelector(".progress-bar");
                        progressBar.classList.remove("bg-primary");
                        progressBar.classList.add("bg-danger");
                        progressBar.style.width = "100%";
                    }
                });
            }
        };
    </script>
@endsection
