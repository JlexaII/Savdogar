<div class="d-flex flex-column flex-shrink-0 p-1 bg-light" style="width: 100%;">
    <span class="fs-4 mb-1 text-dark fw-bold">Выберите категорию</span>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($categories as $category)
            <li class="nav-item mb-2">
                <a class="nav-link link-dark d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#category-{{ $category->id }}">
                    <div>
                        <i class="bi bi-{{ $category->icon }} me-2"></i>{{ $category->name }}
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse" id="category-{{ $category->id }}">
                    <ul class="list-unstyled fw-normal pb-1 small ms-3 mt-2">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="mb-1">
                                <a href="#" class="link-dark rounded d-block py-1 px-2">
                                    <i class="bi bi-arrow-right-circle me-2"></i>{{ $subcategory->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
