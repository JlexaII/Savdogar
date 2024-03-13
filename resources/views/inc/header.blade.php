<nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle shadow-lg border border-info-subtle border-bottom rounded">
    <div class="container-fluid">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none w-25 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gem"
                viewBox="0 0 16 16">
                <path
                    d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6zm11.386 3.785-1.806-2.41-.776 2.413zm-3.633.004.961-2.989H4.186l.963 2.995zM5.47 5.495 8 13.366l2.532-7.876zm-1.371-.999-.78-2.422-1.818 2.425zM1.499 5.5l5.113 6.817-2.192-6.82zm7.889 6.817 5.123-6.83-2.928.002z" />
            </svg>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
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
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('contact') }}">Контакт</a>
          </li>
          <li class="nav-item">
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('contact-data') }}">Сообщения</a>
          </li>
          <li class="nav-item">
            <a class="py-2 link-body-emphasis text-decoration-none" href="{{ route('price') }}">Цены</a>
          </li>
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
          <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form> --}}
      </div>
    </div>
  </nav>
