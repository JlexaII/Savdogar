<nav
    class="navbar navbar-expand-lg navbar-light bg-primary-subtle shadow-lg border border-info-subtle border-bottom rounded sticky-top">
    <div class="container-fluid">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <img src="/image/logo2.png" alt="AMS">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link me-1" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            {{ auth()->user()->name }} <!-- Имя пользователя -->
                        @else
                        {{ __('messages.lc') }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('advertisements.index') }}">{{ __('messages.ma') }}</a></li>
                            @if (!auth()->user()->is_admin)
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('account.delete') }}"
                                        onclick="event.preventDefault(); 
                                        if(confirm('{{ __('messages.dellete') }}')) {
                                            document.getElementById('delete-account-form').submit();
                                        }">
                                        {{ __('messages.deltext') }}
                                    </a>
                                </li>
                                <form id="delete-account-form" action="{{ route('account.delete') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                            @if (auth()->user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('news.index') }}">Новости</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">Админ
                                        панель</a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.exit') }}</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('messages.reg') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('password.request') }}">{{ __('messages.forgot') }}</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">EN</a></li>
                    <li><a class="dropdown-item" href="{{ route('lang.switch', 'ru') }}">RU</a></li>
                    <li><a class="dropdown-item" href="{{ route('lang.switch', 'uz') }}">UZ</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
