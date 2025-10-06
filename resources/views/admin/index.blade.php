@extends('layouts.app')

@section('content')
<div class="container">
    <h3>⚙️ Administration</h3>
    <p class="text-muted">Seuls les administrateurs accèdent à cette page.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <form action="{{ route('admin.updateRole', $user) }}" method="POST" class="d-flex">
                    @csrf
                    @method('PUT')
                    <select name="role" class="form-select me-2">
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <button class="btn btn-sm btn-primary">Mettre à jour</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
