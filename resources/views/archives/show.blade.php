@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $archive->titre }}</h3>
    <a href="{{ asset('storage/'.$archive->fichier) }}" target="_blank">📥 Télécharger</a>
</div>
@endsection
