<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class SubtarefasController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $subtarefas = Subtarefa::all();
        return $this->success($subtarefas);
    }

    public function store(Request $request)
    {
        $subtarefa = Subtarefa::create($request->only(['titulo', 'status', 'tarefa_id']));
        return $this->success($subtarefa, 'Subtarefa criada com sucesso', 201);
    }

    public function show(Subtarefa $subtarefa)
    {
        return $this->success($subtarefa, 'Subtarefa encontrada');
    }

    public function update(Request $request, Subtarefa $subtarefa)
    {
        $subtarefa->update($request->only(['titulo', 'status']));
        return $this->success($subtarefa, 'Subtarefa atualizada com sucesso');
    }

    public function destroy(Subtarefa $subtarefa)
    {
        $subtarefa->delete();
        return $this->success(null, 'Tarefa deletada com sucesso', 204);
    }
}
