@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Mes listes</h1>
            </div>
            <div class="col-4">
                <select class="form-select" name="q" id="searchCategories">
                    <option selected>Sélectionnez une categorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTodo">Ajouter
                    une liste
                </button>
            </div>
        </div>
        <div class="row" id="affichage">

        </div>
    </div>
    @include('commun.modal')
    <script src="/js/search.js"></script>
@endsection
