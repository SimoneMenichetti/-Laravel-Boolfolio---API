@extends('layouts.app')

@section('content')
    <h1>Create New Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="topic" class="form-label">Topic</label>
                    <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic"
                        name="topic" value="{{ old('topic') }}" required>
                    @error('topic')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                        name="start_date" value="{{ old('start_date') }}" required>
                    @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                        name="end_date" value="{{ old('end_date') }}">
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="number_of_posts" class="form-label">Number of Posts</label>
                    <input type="number" class="form-control @error('number_of_posts') is-invalid @enderror"
                        id="number_of_posts" name="number_of_posts" value="{{ old('number_of_posts') }}" required>
                    @error('number_of_posts')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="collaborators" class="form-label">Collaborators</label>
                    <textarea class="form-control @error('collaborators') is-invalid @enderror" id="collaborators" name="collaborators"
                        rows="3" required>{{ old('collaborators') }}</textarea>
                    @error('collaborators')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary d-inline">Create Post</button>

    </form>
@endsection
