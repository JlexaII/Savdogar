@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Список объявлений</h1>

        <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Создать новое объявление</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Изображения</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisements as $advertisement)
                        <tr>
                            <td>{{ $advertisement->title }}</td>
                            <td>{{ $advertisement->description }}</td>
                            <td>
                                @if ($advertisement->images)
                                    @foreach (json_decode($advertisement->images) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail"
                                            style="max-height: 50px; max-width: 50px;">
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if ($advertisement->is_active == 0)
                                    <span class="badge bg-warning">На доработку</span>
                                @elseif ($advertisement->is_active == 1)
                                    <span class="badge bg-success">Одобрено</span>
                                @elseif ($advertisement->is_active == 2)
                                    <span class="badge bg-secondary">Нуждается в доработке</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> <!-- Редактировать -->
                                </a>
                                <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> <!-- Удалить -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">У вас нет объявлений.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
