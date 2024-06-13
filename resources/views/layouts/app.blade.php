<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="CNC machine ЧПУ станок резка металла станки для лазерной резки оборудование фрейзер металл дерево Фрезерные станки с ЧПУ
    проект для инвестирования Projects and profit инвестиции финансы инвесторы инвестиционныйпроект стартап startup бизнесплан стратегия ROI прогнозирование">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">    
    <title>@yield('title-block')</title>
</head>

<body>
    @include('inc.header')
    @if (Request::is('/'))
        @include('inc.hero')
    @endif

    <div class="container mt-5">
        @include('inc.message')
        <div class="row">
            <div>
                @yield('content')
            </div>
            {{-- <div class="col-4 d-none d-lg-block">
                @include('inc.aside')
            </div> --}}
        </div>
    </div>
    <div class="d-block">
        @include('inc.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
