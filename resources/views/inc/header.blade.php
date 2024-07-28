<nav
    class="navbar navbar-expand-lg navbar-light bg-primary-subtle shadow-lg border border-info-subtle border-bottom rounded sticky-top">
    <div class="container-fluid">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <img src="/image/logo2.png" alt="Axmedov's">
        </a>       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <li class="nav-item">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('about') }}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none"
                        href="{{ route('contact') }}">Контакт</a>
                </li>                
                <li class="nav-item">
                    <a class="me-3 py-3 link-body-emphasis text-decoration-none" href="{{ route('price') }}">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="me-3 py-3 link-body-emphasis text-decoration-none" href="{{ route('blog') }}">Блог</a>
                </li>
            </ul>            
        </div>
    </div>
</nav>
