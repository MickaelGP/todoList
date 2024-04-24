@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Mes listes</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTodo">Ajouter une liste</button>
        </div>
        <div class="row">
            
            @foreach ($todos as $todo)
            <div class="col-md-4 my-2">
                <div class="card w-100">
                    <div class="card-header d-flex align-items-center justify-content-evenly">
                        <i class="fa-solid fa-list"></i>
                        <h3 class="card-title">{{$todo->title}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2 text-center">
                                <ul class="list-group">
                                    @forelse ($todo->items as $item)
                                    <li class="list-group-item @if($item->status === 1)list-group-item-success @endif">{{$item->name}}</li>
                                    @empty
                                       <li class="list-group-item list-group-item-dark">Aucune tache</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-12 text-center">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('destroy', $todo) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('show',$todo->id)}}" class="btn btn-primary rounded-5">Voir</a>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <span class="badge rounded-pill text-center text-bg-primary">
                                        <i class="{{$todo->categorie->icon}}"></i>
                                        {{$todo->categorie->name}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
   @include('commun.modal')
@endsection
