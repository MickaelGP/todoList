const searchCategorie = document.getElementById('searchCategories');
const url = "http://127.0.0.1:8000/home/search?";

function fetchAndUpdateDisplay() {
    let params = new URLSearchParams();
    params.append('q', searchCategorie.value);
    fetch(url + params, {
        method: 'GET',
        headers: {
            'Accept': 'text/html',
        },
    })
    .then(response => response.text())
    .then(data => {
        let affichage = document.getElementById('affichage');
        affichage.innerHTML = data;
        affichage.style.opacity = 1;
    })
    .catch(error => console.error('Error in fetch request:', error));
}
document.addEventListener('DOMContentLoaded', function () {
    fetchAndUpdateDisplay();
})

searchCategorie.addEventListener('change', function () {
    fetchAndUpdateDisplay();
})