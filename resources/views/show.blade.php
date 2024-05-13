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
    <div class="container rounded-5 shadow mt-5">
        @forelse($todo->items as $item)
            <div class="accordion accordion-flush rounded-5" id="accordion">
                <div class="accordion-item rounded-5 ">
                    <h2 class="accordion-header rounded-5  ">
                        <button class="accordion-button rounded-5 collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ str_replace(' ', '', $item->name) }}Collapse" aria-expanded="false"
                            aria-controls="{{ str_replace(' ', '', $item->name) }}Collapse">
                            {{ $item->name }}
                        </button>
                    </h2>
                    <div id="{{ str_replace(' ', '', $item->name) }}Collapse" class="accordion-collapse collapse rounded-5"
                        data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-6">
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
                                </div>
                                <div class="col-6 text-center">
                                    <form action="{{ route('todo.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection


@push('scripts')
    <script src="/js/update.js"></script>
@endpush
