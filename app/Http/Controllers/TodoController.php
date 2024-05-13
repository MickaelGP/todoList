<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);
        return view('show', compact('todo'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'todo_id' => ['required']
        ]);

        Item::create($data);

        return back()->with('success', 'Votre liste a bien été ajouté');
    }
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Votre tache à bien été supprimée');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:0,1'],
        ]);

        $item = Item::findOrFail($id);
        $this->authorize('update', $item->todo);
        $item->status = $request->status;
        $item->save();
        return response()->json([
            'message' => 'Modification effectuée'
        ]);
    }
}
