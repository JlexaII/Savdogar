<div class="d-flex flex-column flex-shrink-0 p-1 bg-light" style="width: 100%;">
    <ul class="nav nav-pills flex-column mb-auto border border-success">
        @foreach ($categories as $category)
            <li class="nav-item mb-2">
                <a class="nav-link link-dark d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#category-{{ $category->id }}">
                    <div>
                        <img src="{{ asset('images/icons/' . $category->icon) }}" alt="{{ $category->name }} Icon" class="me-2" style="width: 24px; height: 24px;">{{ $category->name }}
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse" id="category-{{ $category->id }}">
                    <ul class="list-unstyled fw-normal pb-1 small ms-3 mt-2">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="mb-1">
                                <a href="{{ route('categories.subcategory.show', [$category->id, $subcategory->id]) }}" class="link-dark rounded d-block py-1 px-2">
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
