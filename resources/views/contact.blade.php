@extends('layouts.app')

@section('title-block')
    Контакт
@endsection

@section('content')
    <h1>Контактный номер</h1>

    <form action="{{ route('contact-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" placeholder="Введите имя" id="name">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="text" class="form-control" name="email" placeholder="Введите почту" id="email">
        </div>
        <div class="form-group">
            <label for="subject">Тема</label>
            <input type="text" class="form-control" name="subject" placeholder="тема" id="subject">
        </div>
        <div class="form-group">
            <label for="message">Текст сообщения</label>
            <textarea name="message" id="message" class="form-control" placeholder="Введите текст"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Отправить сообщение</button>
    </form>
@endsection
