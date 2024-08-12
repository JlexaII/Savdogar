<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Сведение мета-описаний в один тег -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ __('metadis.text') }} {{ __('metadis.text2') }} {{ __('metadis.text3') }}">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="icon" href="{{ asset('amshold.ico') }}" type="image/x-icon">
    <title>@yield('title-block', __('index.titles'))</title>
    <link rel="canonical" href="https://www.amshold.ru">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body class="bg-dark-blue text-light">
    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <header class="bg-info p-1 shadow-sm fixed-top w-100">
            @include('inc.header')
        </header>

        <!-- Sidebar Toggle Button (Visible on Mobile) -->
        <button class="btn btn-primary d-md-none position-fixed bottom-0 start-0 m-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Sidebar (Visible on Mobile) -->
        @if (!Request::routeIs('advertisements.index'))
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
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
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 offset-md-3 offset-lg-2 bg-light text-dark p-4 rounded shadow">
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
    <div id="cookieConsent" class="alert alert-dark position-fixed bottom-0 w-100 m-0 text-center" role="alert" style="display: none;">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="mb-0">{{ __('coockes.text1') }} <a href="{{ route('privacy') }}" class="text-white text-decoration-underline">{{ __('coockes.text2') }}</a>.</p>
            <button id="acceptCookies" class="btn btn-primary">{{ __('coockes.text3') }}</button>
        </div>
    </div>
    <script src="{{ asset('js/cookieConsent.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map, marker;

            function initMap(lat, lon, zoomLevel = 13) {
                map = L.map('map').setView([lat, lon], zoomLevel);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                marker = L.marker([lat, lon], {
                    draggable: !isViewMode
                }).addTo(map);

                if (!isViewMode) {
                    marker.on('dragend', function(e) {
                        var latlng = marker.getLatLng();
                        document.getElementById('latitude').value = latlng.lat;
                        document.getElementById('longitude').value = latlng.lng;

                        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng.lat}&lon=${latlng.lng}&format=json`)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('address').value = data && data.display_name ? data.display_name : 'Адрес не найден';
                            })
                            .catch(error => console.error('Ошибка при обратном геокодировании:', error));
                    });
                }
            }

            var isEditMode = document.getElementById('latitude').value && document.getElementById('longitude').value;
            var isViewMode = !!document.getElementById('address').readOnly;

            if (isEditMode || isViewMode) {
                var latitude = parseFloat(document.getElementById('latitude').value);
                var longitude = parseFloat(document.getElementById('longitude').value);
                initMap(latitude, longitude);
            }
        });

        // Обработка кликов по ссылкам подкатегорий
        document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]').forEach(function(element) {
            element.addEventListener('click', function() {
                this.parentElement.querySelectorAll('a').forEach(function(link) {
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

        // Обработка форм в админке
        document.querySelectorAll('form[action*="/approve"], form[action*="/rework"], form[action*="/destroy"]').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        console.error('Ошибка:', data.error);
                    }
                })
                .catch(error => console.error('Ошибка:', error));
            });
        });

        // Добавьте остальные необходимые скрипты здесь
    </script>
</body>
</html>
