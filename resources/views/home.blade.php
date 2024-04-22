@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Mes listes</h1>
            <a href="#" class="btn btn-primary">Ajouter une liste</a>
        </div>
        <div class="row">
            <div class="col-md-4 my-2">
                <div class="card w-100">
                    <div class="card-header d-flex align-items-center justify-content-evenly">
                        <i class="bi bi-card-checklist"></i>
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-end">
                        <a href="#" class="btn btn-primary">Voir la liste</a>
                        <div>
                            <span class="badge rounded-pill text-bg-primary">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
