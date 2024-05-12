@php
    $title = 'Gestion' .' '.'|'.' '. $categorie->name;
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('update.categorie', $categorie)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nomCategorie" name="name" value="{{$categorie->name}}">
            </div>
            <div class="mb-3">
                <label for="inputIcone" class="form-label">Icone</label>
                <input type="text" class="form-control" id="nomicon" name="icon" value="{{$categorie->icon}}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
