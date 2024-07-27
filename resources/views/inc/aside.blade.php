@section('aside')
<style>
    .nav-link:hover {
        background-color: #e0e0e0; /* Цвет фона при наведении (не темно-серый) */
        color: #000; /* Цвет текста при наведении */
    }
</style>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Выберите</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                Главное
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                Отчёт
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#table" />
                </svg>
                Продукты
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                Покупатели
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                Заявка
            </a>
        </li>
    </ul>
    <hr>
</div>
@show
