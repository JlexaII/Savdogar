@extends('layouts.app')

@section('title-block')
    Восстановление пароля
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Забыли пароль?</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Кнопка возврата на главную страницу -->
        <a href="{{ url('/') }}" class="btn btn-light position-fixed top-0 start-0 m-3">
            <i class="fas fa-home"></i>
        </a>

        <div class="d-flex flex-column justify-content-center align-items-center flex-grow-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4">
                            <h2 class="text-center mb-4">Забыли пароль?</h2>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Адрес электронной почты</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Отправить ссылку для сброса
                                    пароля</button>
                            </form>
                            <div class="mt-4 text-center">
                                <a href="{{ url('/') }}" class="btn btn-secondary w-100">Вернуться на главную</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
