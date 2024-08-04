<!-- resources/views/news/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->content }}</p>
        <small>Дата публикации: {{ $news->created_at->format('d M Y') }}</small>
    </div>
@endsection
