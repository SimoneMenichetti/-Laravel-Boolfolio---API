@extends('layouts.app')

@section('content')
    <h1>Elenco Post</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Topic</th>
                <th scope="col">Start_date</th>
                <th scope="col">End_date</th>
                <th scope="col">Number_of_posts</th>
                <th scope="col">Collaborators</th>
                <th scope="col">Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->topic }}</td>
                    <td>{{ $post->start_date }}</td>
                    <td>{{ $post->end_date }}</td>
                    <td>{{ $post->number_of_posts }}</td>
                    <td>{{ $post->collaborators }}</td>
                    <td> <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">
                            Details
                        </a>

                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-secondary">
                            Modify
                        </a>


                        {{-- inizio form per il delete --}}

                        <form class="d-inline"action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
