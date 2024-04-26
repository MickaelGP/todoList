@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <h1>Bienvenue {{auth()->user()->name}}</h1>
            </div>
            <div class="col-6">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategorie">Ajouter une catégorie</button>
            </div>
        </div>
    </div>
    <div class="container text-center mt-5">
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Icone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{$categorie->name}}</td>
                    <td>{{$categorie->icon}} <i class="{{$categorie->icon}}"></i></td>
                    <td>
                        <div class="mb-2">
                                <a href="{{route('edit', $categorie)}}" class="btn btn-warning rounded-5">Modifier</a>
                        </div>
                        <div>
                            <form action="{{route('destroy.categorie',$categorie)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded-5" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@include('commun.modalAjoutCategorie')
@endsection
