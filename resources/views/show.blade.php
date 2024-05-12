@php
    $title = 'Ajout de tache';
@endphp
@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h1>Liste</h1>
    </div>
    <div class="container text-center w-50">
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <select name="todo_id" id="todo_id" class="form-control ">
                    <option value="{{ $todo->id }}">{{ $todo->title }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tache à faire</label>
                <input type="text" class="form-control" id="item" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter une tache</button>
        </form>
    </div>
    <div class="container mt-5 w-50 text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tache</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todo->items as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_{{ $item->id }}"
                                    id="status_{{ $item->id }}_0" value="0"
                                    {{ $item->status == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_{{ $item->id }}_0">
                                    A faire
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_{{ $item->id }}"
                                    id="status_{{ $item->id }}_1" value="1"
                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_{{ $item->id }}_1">
                                    Fait
                                </label>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('todo.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td>Aucune tache</td>
                    <td> </td>
                    <td> </td>
                @endforelse
            </tbody>
        </table>
    @endsection


    @push('scripts')
        <script>
            document.querySelectorAll('input[type="radio"]').forEach((radio) => {
                radio.addEventListener('change', function() {
                    const status = this.value;
                    const itemId = this.getAttribute('name').split('_')[
                        1]; // Récupérer l'identifiant de l'élément à partir du nom de l'input
                    fetch(`/todos/${itemId}/update-status`, { // Utilise l'URL correcte pour la mise à jour du statut
                            method: 'PUT', // Utilise la méthode PUT pour mettre à jour les données
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erreur lors de la mise à jour du statut de la tâche.');
                            }
                            const divSuccess = document.createElement("div");
                            divSuccess.className = 'container alert alert-success w-50 text-center';
                            const newContent = document.createTextNode("Votre liste a été mise a jour");
                            divSuccess.appendChild(newContent);
                            document.body.appendChild(divSuccess);
                            setTimeout(() => {
                                divSuccess.remove()
                            }, 3000);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });
        </script>
    @endpush
