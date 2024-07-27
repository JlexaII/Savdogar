<footer class="bg-dark text-light pt-4">
    <div class="container">
        <div class="row">
            <!-- Основной контент футера -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <h5>О компании</h5>
                <p class="text-muted">Наша компания предоставляет высококачественные услуги в области IT-консалтинга и разработки программного обеспечения.</p>
                <p>&copy; 2018-2024 Axmedov's Ltd</p>
            </div>

            <!-- Ссылки футера -->
            <div class="col-6 col-md-2 mb-4 mb-md-0">
                <h5>Функции</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-light">Управление проектами</a></li>
                    <li><a href="#" class="text-light">Анализ данных</a></li>
                    <li><a href="#" class="text-light">Интеграции</a></li>
                    <li><a href="#" class="text-light">Автоматизация процессов</a></li>
                    <li><a href="#" class="text-light">Отчеты и аналитика</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-4 mb-md-0">
                <h5>Ресурсы</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="#" class="text-light">Документация</a></li>
                    <li><a href="#" class="text-light">Блог</a></li>
                    <li><a href="#" class="text-light">Вебинары</a></li>
                    <li><a href="#" class="text-light">Часто задаваемые вопросы</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <h5>Контакты</h5>
                <ul class="list-unstyled text-small">
                    <li><a href="mailto:info@amshold.ru" class="text-light">info@amshold.ru</a></li>
                    <li><a href="tel:+998333606028" class="text-light">+99833 360 60 28</a></li>
                    <li>
                        <a href="https://wa.me/+998333606028" target="_blank" class="text-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            WhatsApp
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Форма подписки на новости -->
        <form id="subscribeForm" method="POST" action="{{ route('subscribe') }}">
            @csrf
            <div class="input-group">
                <input type="email" class="form-control me-2" name="email" placeholder="Ваша почта" aria-label="Email" required>
                <button class="btn btn-primary" type="submit">Подписаться</button>
            </div>
            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif
        </form>        
    </div>
</footer>
