<!-- resources/views/inc/header.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle shadow-lg border border-info-subtle border-bottom rounded sticky-top">
    <div class="container-fluid">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <img src="/image/logo2.png" alt="Axmedov's">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link me-3" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Личный кабинет
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                        <li><a class="dropdown-item" href="{{ route('advertisements.index') }}">Мои объявления</a></li>
                        <li><a class="dropdown-item" href="{{ route('categories.index') }}">Разместить объявление</a></li>
                        @if(auth()->user()->is_admin)
                        <li><a class="dropdown-item" href="{{ route('news.create') }}">Добавить новость</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">Админ панель</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Вход</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Регистрация</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('password.request') }}">Забыли пароль?</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
