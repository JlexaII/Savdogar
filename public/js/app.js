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