@extends('layouts.app')

@section('title-block')
    Изменить запись
@endsection

@section('content')
    <h1>Изменить запись</h1>

    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите имя</label>
            <input type="text" class="form-control" value="{{ $data->name }}" name="name" placeholder="Имя" id="name">
        </div>
        <div class="form-group">
            <label for="email">Введите почту</label>
            <input type="text" class="form-control" value="{{ $data->email }}" name="email" placeholder="почта" id="email">
        </div>
        <div class="form-group">
            <label for="subject">Тема</label>
            <input type="text" class="form-control" value="{{ $data->subject }}" name="subject" placeholder="Тема" id="subject">
        </div>
        <div class="form-group">
            <label for="message">Текст сообщения</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter message">{{ $data->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Изменить сообщение</button>
    </form>
@endsection
