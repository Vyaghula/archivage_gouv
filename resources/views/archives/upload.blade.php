@extends('layouts.app')

@section('content')
<div class="container">
    <h3>📂 Archivage des fichiers</h3>

    <form action="{{ route('archives.upload') }}"
          class="dropzone"
          id="my-dropzone"
          enctype="multipart/form-data">
        @csrf
    </form>

    <button id="submit-all" class="btn btn-primary mt-3">📤 Envoyer</button>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.myDropzone = {
        autoProcessQueue: false,
        paramName: "file",
        maxFilesize: 20, // en MB
        acceptedFiles: ".pdf,.doc,.docx,.jpg,.png",
        parallelUploads: 5,
        addRemoveLinks: true,

        init: function () {
            var submitButton = document.querySelector("#submit-all");
            var myDropzone = this;

            submitButton.addEventListener("click", function () {
                myDropzone.processQueue();
            });

            this.on("success", function (file, response) {
                console.log("Upload terminé :", response);
            });
        }
    };
</script>
@endsection
