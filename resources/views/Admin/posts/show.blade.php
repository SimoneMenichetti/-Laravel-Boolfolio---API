@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <ul>
        <li>Autor: {{ $post->name }}</li>
        <li>Topic: {{ $post->topic }}</li>
        <li>Start_date: {{ $post->start_date }}</li>
        <li>end_date: {{ $post->end_date }}</li>
        <li>Number_of_posts: {{ $post->Number_of_posts }}</li>
        <li>Collaborators: {{ $post->collaborators }}</li>
    </ul>
@endsection
