const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.querySelectorAll('input[type="radio"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        const status = this.value;
        const itemId = this.getAttribute('name').split('_')[
            1]; // Récupérer l'identifiant de l'élément à partir du nom de l'input
        console.log(status);
        console.log(itemId);

        fetch(`http://127.0.0.1:8000/todos/${itemId}/update-status`, { // Utilise l'URL correcte pour la mise à jour du statut
            method: 'PUT', // Utilise la méthode PUT pour mettre à jour les données
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                status: status
            })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la mise à jour du statut de la tâche.');
                }
                return response.json();
            })
            .then(data => {
               createDivElement(data);
            })
            .catch(error => {
                console.error(error);
            });
    });
});

function createDivElement(data) {
    const divSuccess = document.createElement("div");
    divSuccess.className = 'container alert alert-success w-50 text-center';
    const newContent = document.createTextNode(data.message);
    divSuccess.appendChild(newContent);
    document.body.appendChild(divSuccess);
    setTimeout(() => {
        divSuccess.remove()
    }, 3000);
}