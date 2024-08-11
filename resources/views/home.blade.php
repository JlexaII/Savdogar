@extends('layouts.app')

@section('title-block')
    Добро пожаловать на сайт объявлений AMS!
@endsection

@section('content')
    <div class="container mt-5">
        <h6>Последние объявления</h6>
        <!-- Контейнер для динамического обновления списка объявлений -->
        <div id="advertisements-container" class="row">
            @foreach ($advertisements as $advertisement)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="justify-content-center">
                            @if ($advertisement->images)
                                @foreach (json_decode($advertisement->images) as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $advertisement->title }}"
                                        class="img-fluid d-block mx-auto" style="max-height: 200px; object-fit: cover;">
                                @endforeach
                            @endif
                        </div>
                        <div class="card-body p-2">
                            @if ($advertisement->description)
                                <p class="card-text mb-1">{{ Str::limit($advertisement->description, 80) }}</p>
                            @endif
                            @if ($advertisement->price)
                                <p class="card-text mb-1">Цена: {{ $advertisement->price }}</p>
                            @endif
                            @if ($advertisement->phone)
                                <p class="card-text mb-1">Телефон: {{ $advertisement->phone }}</p>
                            @endif
                        </div>
                        <div class="card-footer p-2">
                            <small class="text-muted">
                                <strong>Дата публикации:</strong> {{ $advertisement->created_at->format('d.m.Y H:i') }}
                            </small>
                            <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn btn-primary btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Пагинация -->
        <div class="mt-4">
            {{ $advertisements->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
