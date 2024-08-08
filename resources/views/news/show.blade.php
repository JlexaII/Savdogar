<!-- resources/views/news/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $news->title }}</h1>
        <div style="white-space: pre-wrap;">{{ $news->content }}</div>
        <small>Дата публикации: {{ $news->created_at->format('d M Y') }}</small>
    </div>
@endsection