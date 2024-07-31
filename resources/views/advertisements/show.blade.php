<!-- resources/views/advertisements/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $advertisement->title }}</h1>
    <p>{{ $advertisement->description }}</p>
    @if ($advertisement->images)
        @foreach (json_decode($advertisement->images) as $image)
            <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail" style="max-height: 300px; max-width: 300px;">
        @endforeach
    @endif
    <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
