@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Редактировать новость</h2>
    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $news->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
@endsection
