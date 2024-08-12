@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h4>Все объявления</h4>

        <!-- Фильтрация по дате -->
        <form method="GET" action="{{ route('admin.dashboard.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <input type="date" name="start_date" class="form-control" placeholder="Дата начала"
                        value="{{ request('start_date') }}">
                </div>
                <div class="col-12 col-md-4">
                    <input type="date" name="end_date" class="form-control" placeholder="Дата окончания"
                        value="{{ request('end_date') }}">
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
                        <th>Пользователь</th>
                        <th>
                            Заголовок
                            <a href="{{ route('admin.dashboard.index', array_merge(request()->all(), ['sort_by' => 'title', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" class="btn btn-sm btn-link">
                                @if(request('sort_by') == 'title')
                                    @if(request('sort_order') == 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>Описание</th>
                        <th>Фото</th>
                        <th>
                            Дата создания
                            <a href="{{ route('admin.dashboard.index', array_merge(request()->all(), ['sort_by' => 'created_at', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" class="btn btn-sm btn-link">
                                @if(request('sort_by') == 'created_at')
                                    @if(request('sort_order') == 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>
                            Статус
                            <a href="{{ route('admin.dashboard.index', array_merge(request()->all(), ['sort_by' => 'is_active', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" class="btn btn-sm btn-link">
                                @if(request('sort_by') == 'is_active')
                                    @if(request('sort_order') == 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisements as $advertisement)
                        <tr>
                            <td>{{ $advertisement->id }}</td>
                            <td>{{ optional($advertisement->user)->name ?? 'Пользователь не найден' }}</td>
                            <td>{{ $advertisement->title }}</td>
                            <td>{{ Str::limit($advertisement->description, 50) }}</td>
                            <td>
                                @if ($advertisement->images)
                                    @foreach (json_decode($advertisement->images) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-thumbnail"
                                            style="max-height: 100px; max-width: 100px;">
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
                                <form action="{{ route('admin.dashboard.approve', $advertisement->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm approve-btn" title="Одобрить"
                                        style="{{ $advertisement->is_active == 0 ? 'display:inline;' : 'display:none;' }}">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                </form>

                                <!-- Кнопка на доработку -->
                                <form action="{{ route('admin.dashboard.rework', $advertisement->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm rework-btn" title="На доработку"
                                        style="{{ $advertisement->is_active == 1 ? 'display:inline;' : 'display:none;' }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>

                                <!-- Кнопка удаления -->
                                <form action="{{ route('admin.dashboard.destroy', $advertisement->id) }}" method="POST"
                                    style="display:inline;">
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
                            <td colspan="8">Нет объявлений.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Пагинация -->
        {{ $advertisements->links('pagination::bootstrap-5') }}
    </div>
@endsection
