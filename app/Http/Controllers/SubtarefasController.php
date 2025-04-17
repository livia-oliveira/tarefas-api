<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;
use Illuminate\Http\Request;

class SubtarefasController extends Controller
{
    public function index()
    {
        return Subtarefa::all();
    }

    public function store(Request $request)
    {
        $subtarefa = Subtarefa::create($request->only(['titulo', 'status', 'tarefa_id']));
        return response()->json($subtarefa, 201);
    }

    public function show(Subtarefa $subtarefa)
    {
        return $subtarefa;
    }

    public function update(Request $request, Subtarefa $subtarefa)
    {
        $subtarefa->update($request->only(['titulo', 'status']));
        return response()->json($subtarefa);
    }

    public function destroy(Subtarefa $subtarefa)
    {
        $subtarefa->delete();
        return response()->json(null, 204);
    }
}
