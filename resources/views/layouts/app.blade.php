<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="{{ __('metadis.text') }}">
    <meta name="robots" content="index, follow">
    <meta name="description"
        content="{{ __('metadis.text2') }}">
    <meta name="description"
        content="{{ __('metadis.text3') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="icon" href="{{ asset('amshold.ico') }}" type="image/x-icon">
    <title>@yield('title-block', __('index.titles'))</title>
    <link rel="canonical" href="https://www.amshold.ru">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1HiJfD7FQbDYI1xFjQsW5C1OfVo2ruGn4zHb5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Подключаем Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>


<body class="bg-dark-blue text-light">
    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <header class="bg-info p-1 shadow-sm fixed-top w-100">
            @include('inc.header')
        </header>

        <!-- Sidebar Toggle Button (Visible on Mobile) -->
        <button class="btn btn-primary d-md-none position-fixed bottom-0 start-0 m-1" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Sidebar (Visible on Mobile) -->
        @if (!Request::routeIs('advertisements.index'))
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
        @endif

        <div class="container-fluid flex-fill pt-5 mt-5">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar pt-1 d-none d-md-block">
                    @include('inc.aside')
                </nav>

                <!-- Main Content -->
                <main
                    class="col-md-9 ms-sm-auto col-lg-10 px-md-4 offset-md-3 offset-lg-2 bg-light text-dark p-4 rounded shadow">
                    @if (Request::is('/'))
                        <section class="bg-primary text-white py-1 mb-1 rounded">
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
            <p class="mb-0">{{ __('coockes.text1') }} <a href="{{ route('privacy') }}"
                    class="text-white text-decoration-underline">{{ __('coockes.text2') }}</a>.</p>
            <button id="acceptCookies" class="btn btn-primary">{{ __('coockes.text3') }}</button>
        </div>
    </div>
    <script src="{{ asset('js/cookieConsent.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Подключаем Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]').forEach(function(element) {
            element.addEventListener('click', function() {
                const subcategoryLinks = this.parentElement.querySelectorAll('a');
                subcategoryLinks.forEach(function(link) {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        fetchAdvertisements(this.href);
                    });
                });
            });
        });

        function fetchAdvertisements(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('advertisements-container').innerHTML = data.html;
                })
                .catch(error => console.error('Error:', error));
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Находим все формы с action, содержащим "/approve", "/rework" или "/destroy"
        document.querySelectorAll('form[action*="/approve"], form[action*="/rework"], form[action*="/destroy"]')
            .forEach(function(form) {
                // Добавляем обработчик события submit для каждой найденной формы
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Предотвращаем стандартное поведение отправки формы
                    var formData = new FormData(this); // Создаем объект FormData из текущей формы
                    var url = this.action; // Получаем URL из action формы
                    var row = this.closest('tr'); // Находим ближайший элемент <tr>

                    console.log('Отправка формы на URL:', url); // Сообщение для отладки

                    // Отправляем запрос с использованием fetch API
                    fetch(url, {
                            method: 'POST',
                            body: formData, // Тело запроса содержит данные формы
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest', // Указываем, что запрос выполнен через AJAX
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute(
                                    'content'
                                ) // Добавляем CSRF токен для защиты от CSRF атак
                            }
                        })
                        .then(response => response.json()) // Преобразуем ответ в JSON
                        .then(data => {
                            if (data.success) { // Если запрос выполнен успешно
                                if (url.includes('/approve')) { // Если URL содержит "/approve"
                                    var approveBtn = row.querySelector('.approve-btn');
                                    var reworkBtn = row.querySelector('.rework-btn');
                                    if (approveBtn && reworkBtn) {
                                        approveBtn.style.display =
                                            'none'; // Скрываем кнопку approve
                                        reworkBtn.style.display =
                                            'inline-block'; // Показываем кнопку rework
                                        row.querySelector('td:nth-child(6)').textContent =
                                            'Одобрено'; // Меняем текст в 6-ой колонке на "Одобрено"
                                    } else {
                                        console.error(
                                            'Не найдены кнопки .approve-btn или .rework-btn'
                                        );
                                    }
                                } else if (url.includes(
                                        '/rework')) { // Если URL содержит "/rework"
                                    var approveBtn = row.querySelector('.approve-btn');
                                    var reworkBtn = row.querySelector('.rework-btn');
                                    if (approveBtn && reworkBtn) {
                                        reworkBtn.style.display =
                                            'none'; // Скрываем кнопку rework
                                        approveBtn.style.display =
                                            'inline-block'; // Показываем кнопку approve
                                        row.querySelector('td:nth-child(6)').textContent =
                                            'На доработке'; // Меняем текст в 6-ой колонке на "На доработке"
                                    } else {
                                        console.error(
                                            'Не найдены кнопки .approve-btn или .rework-btn'
                                        );
                                    }
                                } else if (url.includes(
                                        '/destroy')) { // Если URL содержит "/destroy"
                                    row.remove(); // Удаляем строку таблицы
                                }
                            } else { // Если запрос не выполнен успешно
                                alert('Ошибка: ' + data
                                    .message); // Показываем сообщение об ошибке
                            }
                        })
                        .catch(error => { // Обработка ошибок при выполнении запроса
                            console.error('Ошибка:', error);
                        });
                });
            });
    });
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PW2K75RTZ5"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-PW2K75RTZ5');
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var map, marker;

    // Функция инициализации карты
    function initMap(lat, lon, zoomLevel = 13) {
        map = L.map('map').setView([lat, lon], zoomLevel);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        marker = L.marker([lat, lon], {
            draggable: !isViewMode // Если режим просмотра, отключаем перетаскивание маркера
        }).addTo(map);

        // Обновление координат и адреса при перетаскивании маркера (только в режиме редактирования)
        if (!isViewMode) {
            marker.on('dragend', function(e) {
                var latlng = marker.getLatLng();
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;

                // Обратное геокодирование для обновления адреса
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng.lat}&lon=${latlng.lng}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.display_name) {
                            document.getElementById('address').value = data.display_name;
                        } else {
                            document.getElementById('address').value = 'Адрес не найден';
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка при обратном геокодировании:', error);
                    });
            });
        }
    }

    // Определение режима (создание, редактирование или просмотр)
    var isEditMode = document.getElementById('latitude').value && document.getElementById('longitude').value;
    var isViewMode = !!document.getElementById('address').readOnly;

    if (isEditMode || isViewMode) {
        // Режим редактирования или просмотра
        var latitude = parseFloat(document.getElementById('latitude').value);
        var longitude = parseFloat(document.getElementById('longitude').value);
        initMap(latitude, longitude);

        // Если режим редактирования, можно изменить координаты
        if (isEditMode) {
            document.getElementById('address').addEventListener('change', function() {
                // Геокодирование адреса
                var address = this.value;
                fetch(`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json&limit=1`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            var lat = parseFloat(data[0].lat);
                            var lon = parseFloat(data[0].lon);
                            map.setView([lat, lon], 13);
                            marker.setLatLng([lat, lon]);
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lon;
                        } else {
                            alert('Адрес не найден');
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка при геокодировании:', error);
                    });
            });
        }
    } else {
        // Режим создания
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
                initMap(lat, lon);
            }, function() {
                // При отказе от доступа к местоположению по умолчанию Москва
                initMap(55.7558, 37.6173);
                document.getElementById('address').value = "Москва";
            });
        } else {
            // Если геолокация не поддерживается, по умолчанию Москва
            initMap(55.7558, 37.6173);
            document.getElementById('address').value = "Москва";
        }
    }
});

</script>
