@extends('layouts.app')

@section('content')
    <h1>Список объявлений</h1>

    <!-- Передаем параметр category в маршрут -->
    <a href="{{ route('advertisements.create', ['category' => $categoryId]) }}" class="btn btn-primary mb-3">Создать новое объявление</a>

    <ul class="list-group">
        @forelse ($advertisements as $advertisement)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div>
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
                </div>

                <!-- Действия доступны только для владельца объявления -->
                @if (auth()->check() && (auth()->user()->id == $advertisement->user_id))
                    <div class="btn-group" role="group" aria-label="Actions">
                        {{-- @if ($advertisement->is_active == 0 || $advertisement->is_active == 2) --}}
                            <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn btn-info btn-sm" title="Просмотреть">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning btn-sm" title="Редактировать">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Удалить">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        {{-- @endif --}}
                    </div>
                @endif
            </li>
        @empty
            <li class="list-group-item">У вас нет объявлений.</li>
        @endforelse
    </ul>
@endsection
