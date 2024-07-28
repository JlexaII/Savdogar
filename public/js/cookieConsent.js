document.addEventListener("DOMContentLoaded", function() {
    // Проверка наличия куки
    if (!getCookie('cookieConsent')) {
        document.getElementById('cookieConsent').style.display = 'block';
    }

    // Установка куки после согласия
    document.getElementById('acceptCookies').addEventListener('click', function() {
        setCookie('cookieConsent', 'accepted', 365);
        document.getElementById('cookieConsent').style.display = 'none';
    });

    // Функция для установки куки
    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Функция для получения куки
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
});
