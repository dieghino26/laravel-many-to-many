@extends('layouts.app')

@section('title', 'Projects')

@section('content')


    <header>
        <h1 class="my-5">{{ $project->title }}</h1>
    </header>
    <hr>
    <main>
        <div class="clearfix">
            <div>{{ $project->type }}</div>
            @if ($project->image)
                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="me-2 float-start">
            @endif
            <p>{{ $project->description }}</p>
            <div>
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="me-2"><strong>Creato il:</strong>
                            {{ $project->getFormattedDate('created_at') }}</span>
                        <span><strong>Creato il:</strong> {{ $project->getFormattedDate('updated_at') }}</span>
                    </div>
                    <div class="d-flex gap-2">
                        @forelse($project->technologies as $technology)
                            <span class="badge text-bg-{{ $technology->color }}">{{ $technology->label }}</span>
                        @empty
                            -
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="d-flex justify-content-between align-items-center my-3">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna indietro</a>

        <div class="d-flex justify-content-between gap-2">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-pencil me-2"></i> Modifica
            </a>

            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    <i class="fas fa-trash me-2"></i> Elimina
                </button>
            </form>
        </div>


    </footer>

@endsection
@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
