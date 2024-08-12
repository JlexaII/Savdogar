<nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle shadow-lg border border-info-subtle border-bottom rounded sticky-top">
    <div class="container-fluid">
        <a href="/" class="navbar-brand d-flex align-items-center text-decoration-none">
            <img src="/image/logo2.png" alt="AMS" style="max-height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            {{ auth()->user()->name }}
                        @else
                            {{ __('messages.lc') }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('advertisements.index') }}">{{ __('messages.ma') }}</a></li>
                            @if (!auth()->user()->is_admin)
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('account.delete') }}" onclick="event.preventDefault(); 
                                        if(confirm('{{ __('messages.dellete') }}')) {
                                            document.getElementById('delete-account-form').submit();
                                        }">
                                        {{ __('messages.deltext') }}
                                    </a>
                                </li>
                                <form id="delete-account-form" action="{{ route('account.delete') }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                            @if (auth()->user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('news.index') }}">Новости</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">Админ панель</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.exit') }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('messages.reg') }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('password.request') }}">{{ __('messages.forgot') }}</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 60 30" class="me-2">
                                <clipPath id="s">
                                    <path d="M0 0v30h60V0z"/>
                                </clipPath>
                                <g clip-path="url(#s)">
                                    <path d="M0 0v30h60V0z" fill="#012169"/>
                                    <path d="M0 0l60 30M0 30L60 0" stroke="#FFF" stroke-width="6"/>
                                    <path d="M0 0l60 30M0 30L60 0" stroke="#C8102E" stroke-width="4"/>
                                    <path d="M30 0v30M0 15h60" stroke="#FFF" stroke-width="10"/>
                                    <path d="M30 0v30M0 15h60" stroke="#C8102E" stroke-width="6"/>
                                </g>
                            </svg>
                            EN
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('lang.switch', 'ru') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 9 6" class="me-2">
                                <path fill="#fff" d="M0 0h9v6H0z"/>
                                <path fill="#0039a6" d="M0 2h9v4H0z"/>
                                <path fill="#d52b1e" d="M0 4h9v2H0z"/>
                            </svg>
                            RU
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('lang.switch', 'uz') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 5 3" class="me-2">
                                <path fill="#1eb53a" d="M0 0h5v3H0z"/>
                                <path fill="#fff" d="M0 1h5v1H0z"/>
                                <path fill="#0099b5" d="M0 0h5v1H0z"/>
                                <path fill="#fff" d="M1 1a1 1 0 110-2 1 1 0 110 2zm0-.4a.4.4 0 100-.8.4.4 0 100 .8m.45-.1a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8 0a.1.1 0 100-.2.1.1 0 100 .2m.8-.3a.1.1 0 100-.2.1.1 0 100 .2m-.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8 0a.1.1 0 100-.2.1.1 0 100 .2m.8-.3a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8 0a.1.1 0 100-.2.1.1 0 100 .2m.8-.3a.1.1 0 100-.2.1.1 0 100 .2m-.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.4 0a.1.1 0 100-.2.1.1 0 100 .2M.25.5a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8.3a.1.1 0 100-.2.1.1 0 100 .2M.25.5a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8.3a.1.1 0 100-.2.1.1 0 100 .2M.25.8a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8.3a.1.1 0 100-.2.1.1 0 100 .2M.25 1.1a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m-.8.3a.1.1 0 100-.2.1.1 0 100 .2M.25 1.4a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2m.4 0a.1.1 0 100-.2.1.1 0 100 .2"/>
                            </svg>
                            UZ
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
