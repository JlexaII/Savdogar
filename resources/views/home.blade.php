@extends('layouts.app')

@section('title-block')
    Добро пожаловать на сайт объявлений AMS!
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Последние объявления</h2>
        <!-- Контейнер для динамического обновления списка объявлений -->
        <div id="advertisements-container" class="row">
            @foreach ($advertisements as $advertisement)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="justify-content-center">
                            @if ($advertisement->images)
                                @foreach (json_decode($advertisement->images) as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $advertisement->title }}"
                                        class="img-fluid d-block mx-auto" style="max-height: 300px; object-fit: cover;">
                                @endforeach
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($advertisement->description)
                                <p class="card-text">{{ Str::limit($advertisement->description, 100) }}</p>
                            @endif
                            @if ($advertisement->price)
                                <p class="card-text">Цена: {{ Str::limit($advertisement->price, 100) }}</p>
                            @endif
                            @if ($advertisement->phone)
                                <p class="card-text">Телефон: {{ Str::limit($advertisement->phone, 100) }}</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $advertisement->created_at->format('d.m.Y') }}</small>
                            <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn btn-primary">Подробнее</a>
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
