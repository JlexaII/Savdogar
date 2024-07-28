@section('aside')
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="bi bi-bootstrap-fill pe-none me-2" style="font-size: 2rem;"></i>
        <span class="fs-4">Выберите</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link active" aria-current="page">
                <i class="bi bi-house-fill pe-none me-2"></i>
                Главное
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-speedometer2 pe-none me-2"></i>
                Отчёт
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-table pe-none me-2"></i>
                Продукты
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-grid pe-none me-2"></i>
                Покупатели
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-people-circle pe-none me-2"></i>
                Заявка
            </a>
        </li>
    </ul>
    <hr>
</div>
@show
