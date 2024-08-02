<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="bi bi-bootstrap-fill pe-none me-2" style="font-size: 2rem;"></i>
        <span class="fs-4">Выберите</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link link-dark" data-bs-toggle="collapse" href="#category-{{ $category->id }}">
                    <i class="bi bi-{{ $category->icon }}"></i> {{ $category->name }}
                </a>
                <div class="collapse" id="category-{{ $category->id }}">
                    <ul class="list-unstyled fw-normal pb-1 small">
                        @foreach ($category->subcategories as $subcategory)
                            <li><a href="#" class="link-dark rounded">{{ $subcategory->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
