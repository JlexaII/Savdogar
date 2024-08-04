@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h4>Все объявления</h4>

        <!-- Фильтрация по дате -->
        <form method="GET" action="{{ route('admin.dashboard.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <input type="date" name="start_date" class="form-control" placeholder="Дата начала" value="{{ request('start_date') }}">
                </div>
                <div class="col-12 col-md-4">
                    <input type="date" name="end_date" class="form-control" placeholder="Дата окончания" value="{{ request('end_date') }}">
                </div>
                <div class="col-12 col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Фильтровать</button>
                </div>
            </div>
        </form>

        <!-- Общая информация -->
        <div class="mb-3">
            <strong>Всего объявлений:</strong> {{ $totalAdvertisements }}
        </div>

        <!-- Таблица объявлений -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>Дата создания</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisements as $advertisement)
                        <tr>
                            <td>{{ $advertisement->id }}</td>
                            <td>{{ $advertisement->title }}</td>
                            <td>{{ Str::limit($advertisement->description, 50) }}</td>
                            <td>
                                @if ($advertisement->images)
                                    @foreach (json_decode($advertisement->images) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail" style="max-height: 100px; max-width: 100px;">
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $advertisement->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                @if ($advertisement->is_active == 1)
                                    Одобрено
                                @elseif ($advertisement->is_active == 2)
                                    На доработке
                                @else
                                    Ожидает одобрения
                                @endif
                            </td>
                            <td>
                                <!-- Кнопка одобрения -->
                                @if ($advertisement->is_active != 1)
                                    <form action="{{ route('admin.dashboard.approve', $advertisement->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" title="Одобрить">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                @endif

                                <!-- Кнопка на доработку -->
                                @if ($advertisement->is_active != 2)
                                    <form action="{{ route('admin.dashboard.rework', $advertisement->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm" title="На доработку">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>
                                @endif

                                <!-- Кнопка удаления -->
                                <form action="{{ route('admin.dashboard.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Удалить">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Нет объявлений.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Пагинация -->
        {{ $advertisements->links() }}
    </div>
@endsection
