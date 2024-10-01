@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p><strong>Descrizione:</strong> {{ $project->description }}</p>
        <p><strong>Tipologia:</strong>
            @if ($project->type)
                <span class="badge bg-primary">{{ $project->type->name }}</span>
            @else
                <span class="badge bg-danger">N/A</span>
            @endif
        </p>
        <!-- Visualizza l'immagine del progetto se presente -->

        <div class="mb-3">
            <strong>Immagine:</strong>
            @if ($project->path_image)
                <img src="{{ asset('storage/' . $project->path_image) }}" alt="{{ $project->image_original_name }}"
                    class="project-image">
            @else
                N/A
            @endif
        </div>


        <p><strong>Technologie:</strong>
            @if ($project->technologies && $project->technologies->isNotEmpty())
                <span class="badge bg-success">
                    @foreach ($project->technologies as $technology)
                        {{ $technology->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                @else
                    <span class="badge bg-success">
                        N/A
                    </span>
            @endif
            </span>
        </p>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna alla lista</a>

        <!-- Pulsante Modifica -->
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica Progetto</a>

        <!-- Form per eliminare il progetto -->
        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Sei sicuro di voler eliminare questo progetto?');">Elimina Progetto</button>
        </form>
    </div>
@endsection
