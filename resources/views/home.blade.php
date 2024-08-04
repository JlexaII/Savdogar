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
                        @if ($advertisement->images)
                            @foreach (json_decode($advertisement->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $advertisement->title }}" class="img-thumbnail"
                                    style="max-height: 300px; max-width: 300px;">
                            @endforeach
                        @endif                       
                        <div class="card-body">                          
                            <p class="card-text">{{ Str::limit($advertisement->description, 100) }}</p>
                            <p class="card-text">Цена: {{ Str::limit($advertisement->price, 100) }}</p>
                            <p class="card-text">Телефон: {{ Str::limit($advertisement->phone, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $advertisement->created_at->format('d.m.Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
