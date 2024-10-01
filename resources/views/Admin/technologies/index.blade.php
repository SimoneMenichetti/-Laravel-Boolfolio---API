@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tecnologie</h1>

        <!-- Visualizza messaggi di successo, errori e di validazione -->
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Pulsante per creare una nuova tecnologia -->
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">Nuova Tecnologia</a>

        <!-- Tabella delle tecnologie -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Nome</th>
                    <th class="align-middle">Descrizione</th>
                    <th class="align-middle">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td class="align-middle">{{ $technology->id }}</td>
                        <td class="align-middle">{{ $technology->name }}</td>
                        <td class="align-middle">{{ $technology->description }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                class="btn btn-warning btn-sm">Modifica</a>
                            <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginazione -->
        {{ $technologies->links() }}
    </div>
@endsection
