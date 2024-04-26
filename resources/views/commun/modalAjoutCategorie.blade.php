<!-- Modal -->
<div class="modal fade" id="addCategorie" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Ajouter une catégorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.categorie')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nomCategorie" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="inputIcone" class="form-label">Icone</label>
                        <input type="text" class="form-control" id="nomicon" name="icon">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>
</div>
