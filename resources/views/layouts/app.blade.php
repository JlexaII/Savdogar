<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Invest in AXMEDOV'S - a leading company in IT and construction technologies. Discover our innovative projects and opportunities for growing your capital.">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="icon" href="{{ asset('amshold.ico') }}" type="image/x-icon">
    <title>@yield('title-block')</title>
    <link rel="canonical" href="https://www.amshold.ru">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1HiJfD7FQbDYI1xFjQsW5C1OfVo2ruGn4zHb5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body class="bg-dark-blue text-light"> <!-- Темно-синий фон и светлый текст -->
    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <header class="bg-info p-3 shadow-sm fixed-top w-100">
            @include('inc.header')
        </header>

        <!-- Sidebar Toggle Button (Visible on Mobile) -->
        <button class="btn btn-primary d-md-none position-fixed bottom-0 start-0 m-3" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Sidebar (Visible on Mobile) -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar"
            aria-labelledby="offcanvasSidebarLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasSidebarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @include('inc.aside')
            </div>
        </div>

        <div class="container-fluid flex-fill pt-5 mt-5">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar pt-5 d-none d-md-block">
                    @include('inc.aside')
                </nav>

                <!-- Main Content -->
                <main
                    class="col-md-9 ms-sm-auto col-lg-10 px-md-4 offset-md-3 offset-lg-2 bg-light text-dark p-4 rounded shadow">
                    <!-- Светло-синий фон для контента с классами Bootstrap -->
                    @if (Request::is('/'))
                        <section class="bg-primary text-white py-5 mb-4 rounded">
                            @include('inc.hero')
                        </section>
                    @endif
                    <div class="container">
                        @include('inc.message')
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark py-3 mt-auto">
            <div class="container">
                @include('inc.footer')
            </div>
        </footer>
    </div>

    <!-- Cookie Consent -->
    <div id="cookieConsent" class="alert alert-dark position-fixed bottom-0 w-100 m-0 text-center" role="alert"
        style="display: none;">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="mb-0">Мы используем файлы cookie для улучшения работы нашего сайта. Продолжая использовать сайт,
                вы соглашаетесь с нашей <a href="{{ route('privacy') }}"
                    class="text-white text-decoration-underline">политикой использования файлов cookie</a>.</p>
            <button id="acceptCookies" class="btn btn-primary">Принять</button>
        </div>
    </div>

    <script src="{{ asset('js/cookieConsent.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Подключение Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
