<!-- resources/views/user/advertisements.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Мои объявления</h1>

    @if($advertisements->isEmpty())
        <p>У вас нет объявлений.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <td>{{ $advertisement->title }}</td>                      
                        <td>{{ $advertisement->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
