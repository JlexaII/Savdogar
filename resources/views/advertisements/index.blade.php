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
                
                <!-- Показать статус объявления -->
                <p>
                    @if ($advertisement->is_active == 0)
                        <span class="badge bg-warning">На доработку</span>
                    @elseif ($advertisement->is_active == 1)
                        <span class="badge bg-success">Одобрено</span>
                    @elseif ($advertisement->is_active == 2)
                        <span class="badge bg-secondary">Нуждается в доработке</span>
                    @endif
                </p>

                <!-- Действия доступны только для не одобренных и не доработанных объявлений -->
                @if ($advertisement->is_active == 0 || $advertisement->is_active == 2)
                    <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn btn-info">Просмотреть</a>
                    <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                @endif
            </li>
        @empty
            <li class="list-group-item">У вас нет объявлений.</li>
        @endforelse
    </ul>
@endsection
