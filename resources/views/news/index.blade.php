@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Новости</h2>
    <a href="{{ route('news.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Добавить новость
    </a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Содержание</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ Str::limit($item->content, 100) }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i> Редактировать
                        </a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить эту новость?')">
                                <i class="bi bi-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
