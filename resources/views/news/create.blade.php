{{-- resources/views/news/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Добавить новость</h2>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
