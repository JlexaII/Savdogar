@extends('layouts.app')

@section('title-block')
    Регистрация
@endsection

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center flex-grow-1">
        <div class="form-container">
            <h2 class="text-center mb-4">Регистрация</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Электронная почта</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
            </form>
            <a href="{{ url('auth/google') }}" class="btn social-button social-google mt-3">Зарегистрироваться с помощью Google</a>
            <a href="{{ url('auth/facebook') }}" class="btn social-button social-facebook mt-2">Зарегистрироваться с помощью Facebook</a>
            <a href="{{ url('auth/yandex') }}" class="btn social-button social-yandex mt-2">Зарегистрироваться через Яндекс</a>

            <a href="{{ route('login') }}" class="btn btn-link d-block text-center mt-3">Уже есть аккаунт? Войти</a>
        </div>
    </div>

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

        .social-yandex {
            background-color: #ffcc00;
            color: #000; /* У Яндекса черный текст на желтой кнопке */
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
@endsection
