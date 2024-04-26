<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkRole');
    }
    public function index()
    {
        $categories = Categorie::all();
        return view('gestion.admin', compact('categories'));
    }

    public function storeCategorie(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
        ]);

        Categorie::create($data);

        return back()->with('success', 'Catégorie ajouté avec succés');
    }
    public function editCategorie(Categorie $categorie)
    {
        return view('gestion.edit', compact('categorie'));
    }
    public function updateCategorie(Request $request,Categorie $categorie)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
        ]);
        $categorie->update($data);

        return redirect()->route('gestion')->with('success', 'Catégorie modifiée avec succes');
    }
    public function destroyCategorie(Categorie $categorie)
    {
        $categorie->delete();

        return back()->with('success', 'la catégorie à bien été supprimée');
    }
}
