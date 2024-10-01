@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dettagli Tecnologia</h1>

        <div class="card">
            <div class="card-header">
                {{ $technology->name }}
            </div>
            <div class="card-body">
                <p><strong>ID: </strong>{{ $technology->id }}</p>
                <p><strong>Nome: </strong>{{ $technology->name }}</p>
                <p><strong>Descrizione: </strong>{{ $technology->description }}</p>
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Indietro</a>

                <!-- Pulsante Modifica -->
                <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning">Modifica Tecnologia</a>

                <!-- Form per eliminare la tecnologia -->
                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?');">
                        Elimina Tecnologia
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
