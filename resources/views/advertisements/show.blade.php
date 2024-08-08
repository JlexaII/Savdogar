<!-- resources/views/advertisements/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $advertisement->title }}</h1>
        <div class="row">
            @if ($advertisement->images)
                @foreach (json_decode($advertisement->images) as $image)
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $advertisement->title }}" class="img-thumbnail">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mt-4">
            <p>{{ $advertisement->description }}</p>
            <p>Цена: {{ $advertisement->price }}</p>
            <p>Телефон: {{ $advertisement->phone }}</p>
        </div>
        <small class="text-muted">Дата публикации: {{ $advertisement->created_at->format('d.m.Y') }}</small>
    </div>
@endsection
