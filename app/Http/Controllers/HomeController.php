<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categorie::all();

        $user = auth()->user();

        $todos = $user->todos()->orderBy('categorie_id')->get();

        return view('home', compact('categories', 'todos'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'categorie_id' => ['required', 'integer']
        ]);
        auth()->user()->todos()->create($data);

        return redirect()->back()->with('success', 'Votre nouvelle liste à bien été ajoutée');
    }
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return back()->with('success', 'Votre liste à bien été supprimée');

    }
}
