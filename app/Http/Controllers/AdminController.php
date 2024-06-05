<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Vérifie si l'utilisateur a le rôle nécessaire avant d'accéder aux fonctionnalités
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkRole');
    }

    /**
     * Affiche la page d'administration avec la liste des catégories
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Récupère toutes les catégories de la base de données
        $categories = Categorie::all();

        // Transmet les catégories récupérées à la vue admin
        return view('gestion.admin', compact('categories'));
    }

    /**
     * Crée une nouvelle catégorie
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeCategorie(Request $request): RedirectResponse
    {
        // Valide les données d'entrée pour la création de la catégorie
        $data = $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'icon' => ['nullable', 'string', 'max:60'],
        ]);

        // Crée une nouvelle instance de Categorie avec les données validées
        Categorie::create($data);

        // Redirige vers la page d'administration avec un message de succès
        return back()->with('success', 'Catégorie ajouté avec succés');
    }

    /**
     * Affiche le formulaire d'édition d'une catégorie
     *
     * @param Categorie $categorie
     * @return \Illuminate\View\View
     */
    public function editCategorie(Categorie $categorie): View
    {
        // Transmet la catégorie à éditer à la vue d'édition
        return view('gestion.edit', compact('categorie'));
    }

    /**
     * Met à jour une catégorie existante
     *
     * @param Request $request
     * @param Categorie $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategorie(Request $request,Categorie $categorie): RedirectResponse
    {
        // Valide les données d'entrée pour la mise à jour de la catégorie
        $data = $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'icon' => ['nullable', 'string', 'max:60'],
        ]);
        // Met à jour la catégorie existante avec les données validées
        $categorie->update($data);

        // Redirige vers la page d'administration avec un message de succès de mise à jour
        return redirect()->route('gestion')->with('success', 'Catégorie modifiée avec succes');
    }

    /**
     * Supprime une catégorie
     *
     * @param Categorie $categorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyCategorie(Categorie $categorie): RedirectResponse
    {
        // Supprime la catégorie spécifiée
        $categorie->delete();

        // Redirige vers la page d'administration avec un message de succès de suppression
        return back()->with('success', 'la catégorie à bien été supprimée');
    }
}
