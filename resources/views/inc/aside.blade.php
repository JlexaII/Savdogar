<!-- resources/views/categories/sidebar.blade.php -->
<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 100%; border-right: 1px solid #dee2e6;">
    <!-- Категории (скрываются на странице "Мои объявления") -->
    @unless(request()->routeIs('advertisements.index'))
        <ul class="nav nav-pills flex-column mb-auto border-bottom border-secondary pb-2">
            @foreach ($categories as $category)
                <li class="nav-item mb-2">
                    <a class="nav-link link-dark d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#category-{{ $category->id }}" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <!-- Иконка категории -->
                            <img src="{{ asset('images/icons/' . $category->icon) }}" alt="{{ $category->name }} Icon" class="me-2" style="width: 24px; height: 24px;">
                            <!-- Название категории -->
                            <span>{{ $category->name }}</span>
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="collapse" id="category-{{ $category->id }}">
                        <ul class="list-unstyled fw-normal pb-1 small ms-3 mt-2 border-top border-secondary pt-2">
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
    @endunless

    <!-- Новости (всегда видим) -->
    <div class="mt-3">
        <h5 class="text-dark mb-2 text-center">Новости</h5>
        <ul class="nav nav-pills flex-column mb-auto border-top border-secondary pt-2">
            @foreach ($sidebarNews as $newsItem)
                <li class="nav-item mb-2">
                    <a href="{{ route('news.show', $newsItem->id) }}" class="nav-link link-dark d-flex align-items-center justify-content-between">
                        <div>{{ $newsItem->title }}</div>
                        <span class="badge bg-info rounded-pill">{{ $newsItem->created_at->format('d M') }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
