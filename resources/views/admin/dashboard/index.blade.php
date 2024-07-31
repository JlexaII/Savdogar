@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Неодобренные объявления</h1>
        <ul class="list-group">
            @foreach ($advertisements as $advertisement)
                <li class="list-group-item">
                    <h5 class="mb-1">{{ $advertisement->title }}</h5>
                    <p class="mb-1"><strong>Описание:</strong> {{ $advertisement->description }}</p>
                    @if ($advertisement->images)
                    <p class="mb-1"><strong>Фото:</strong></p>
                        @foreach (json_decode($advertisement->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail"
                                style="max-height: 300px; max-width: 300px;">
                        @endforeach
                    @endif
                    <p class="mb-1"><strong>Адрес:</strong> {{ $advertisement->address }}</p>
                    <p class="mb-1"><strong>Телефон:</strong> {{ $advertisement->phone }}</p>
                    <p class="mb-1"><strong>Квадратные метры:</strong> {{ $advertisement->square_meters }}</p>
                    <p class="mb-1"><strong>Описание автомобиля:</strong> {{ $advertisement->car_description }}</p>
                    <p class="mb-1"><strong>Подкатегория:</strong> {{ $advertisement->subcategory->name }}</p>
                    <p class="mb-1"><strong>Дата создания:</strong>
                        {{ $advertisement->created_at->format('d.m.Y H:i:s') }}</p>

                    <div class="mt-3">
                        <form action="{{ route('admin.dashboard.approve', $advertisement->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Одобрить</button>
                        </form>
                        <form action="{{ route('admin.dashboard.destroy', $advertisement->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
