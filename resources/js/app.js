import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]').forEach(function (element) {
        element.addEventListener('click', function () {
            const subcategoryLinks = this.parentElement.querySelectorAll('a');
            subcategoryLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
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
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Добавляем CSRF токен для защиты от CSRF атак
                        }
                    })
                    .then(response => response.json()) // Преобразуем ответ в JSON
                    .then(data => {
                        if (data.success) { // Если запрос выполнен успешно
                            if (url.includes('/approve')) { // Если URL содержит "/approve"
                                var approveBtn = row.querySelector('.approve-btn');
                                var reworkBtn = row.querySelector('.rework-btn');
                                if (approveBtn && reworkBtn) {
                                    approveBtn.style.display = 'none'; // Скрываем кнопку approve
                                    reworkBtn.style.display = 'inline-block'; // Показываем кнопку rework
                                    row.querySelector('td:nth-child(6)').textContent = 'Одобрено'; // Меняем текст в 6-ой колонке на "Одобрено"
                                } else {
                                    console.error('Не найдены кнопки .approve-btn или .rework-btn');
                                }
                            } else if (url.includes('/rework')) { // Если URL содержит "/rework"
                                var approveBtn = row.querySelector('.approve-btn');
                                var reworkBtn = row.querySelector('.rework-btn');
                                if (approveBtn && reworkBtn) {
                                    reworkBtn.style.display = 'none'; // Скрываем кнопку rework
                                    approveBtn.style.display = 'inline-block'; // Показываем кнопку approve
                                    row.querySelector('td:nth-child(6)').textContent = 'На доработке'; // Меняем текст в 6-ой колонке на "На доработке"
                                } else {
                                    console.error('Не найдены кнопки .approve-btn или .rework-btn');
                                }
                            } else if (url.includes('/destroy')) { // Если URL содержит "/destroy"
                                row.remove(); // Удаляем строку таблицы
                            }
                        } else { // Если запрос не выполнен успешно
                            alert('Ошибка: ' + data.message); // Показываем сообщение об ошибке
                        }
                    })
                    .catch(error => { // Обработка ошибок при выполнении запроса
                        console.error('Ошибка:', error);
                    });
            });
        });
});
