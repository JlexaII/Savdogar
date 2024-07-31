@extends('layouts.app')

@section('title-block')
    Вход в систему
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Вход</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            .social-button {
                color: #fff;
                text-align: center;
                margin: 5px;
                width: 100%;
            }

            .social-google {
                background-color: #db4437;
            }

            .social-facebook {
                background-color: #3b5998;
            }

            .social-twitter {
                background-color: #1da1f2;
            }

            .social-github {
                background-color: #333;
            }

            .form-container {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                background-color: #f8f9fa;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <a href="{{ route('home') }}" class="btn btn-light position-fixed top-0 start-0 m-3">
            <i class="fas fa-home"></i>
        </a>
        <div class="d-flex flex-column justify-content-center align-items-center flex-grow-1">
            <div class="form-container">
                <h2 class="text-center mb-4">Вход</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Электронная почта</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                </form>
                <a href="{{ url('auth/google') }}" class="btn social-button social-google mt-3">Войти с помощью Google</a>
                <a href="{{ url('auth/facebook') }}" class="btn social-button social-facebook mt-2">Войти с помощью
                    Facebook</a>
                <a href="{{ url('auth/twitter') }}" class="btn social-button social-twitter mt-2">Войти с помощью
                    Twitter</a>
                <a href="{{ url('auth/github') }}" class="btn social-button social-github mt-2">Войти с помощью GitHub</a>
                <a href="{{ route('password.request') }}" class="btn btn-link d-block text-center mt-3">Забыли пароль?</a>
                <a href="{{ route('register') }}" class="btn btn-link d-block text-center mt-3">Нет аккаунта?
                    Зарегистрироваться</a>
            </div>
        </div>
    </body>

    </html>
@endsection
