<!-- resources/views/advertisements/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Список объявлений</h1>

    <!-- Передаем параметр category в маршрут -->
    <a href="{{ route('advertisements.create', ['category' => $categoryId]) }}" class="btn btn-primary mb-3">Создать новое объявление</a>

    <ul class="list-group">
        @forelse ($advertisements as $advertisement)
            <li class="list-group-item">
                <h2>{{ $advertisement->title }}</h2>
                <p>{{ $advertisement->description }}</p>
                @if ($advertisement->images)
                    @foreach (json_decode($advertisement->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail" style="max-height: 150px; max-width: 150px;">
                    @endforeach
                @endif
                <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn btn-info">Просмотреть</a>
                <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning">Редактировать</a>
                <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">У вас нет объявлений.</li>
        @endforelse
    </ul>
@endsection
