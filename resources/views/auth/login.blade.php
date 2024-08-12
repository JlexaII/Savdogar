@extends('layouts.app')

@section('title-block')
{{ __('login.enter') }}
@endsection

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center flex-grow-1">
        <div class="form-container">
            <h2 class="text-center mb-4">{{ __('login.login') }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('login.emal') }}</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('login.pass') }}</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">{{ __('login.zapom') }}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">{{ __('login.enter') }}</button>
            </form>
            <a href="{{ url('auth/google') }}" class="btn social-button social-google mt-3">{{ __('login.goog') }}</a>
            <a href="{{ url('auth/facebook') }}" class="btn social-button social-facebook mt-2">{{ __('login.face') }}</a>
            <a href="{{ url('auth/yandex') }}" class="btn social-button social-yandex mt-2">{{ __('login.yan') }}</a>

            <a href="{{ route('password.request') }}" class="btn btn-link d-block text-center mt-3">{{ __('login.zabil') }}</a>
            <a href="{{ route('register') }}" class="btn btn-link d-block text-center mt-3">{{ __('login.nacc') }}</a>
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
