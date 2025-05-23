<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSubtarefaRequest;

class SubtarefasController extends Controller
{
    use ApiResponse;

    public function index()
    {
       $subtarefas = Subtarefa::all();

       return response()->json([
            'message' => 'Lista de subtarefas recuperada com sucesso',
            'data' => $subtarefas
       ], 200);
    }

    public function store(StoreSubtarefaRequest $request){
        $dados = $request->only(['titulo', 'concluida', 'tarefa_id']);

        $subtarefa = Subtarefa::create([
            'titulo' => $dados['titulo'],
            'concluida' => false,
            'tarefa_id' => $dados['tarefa_id']
        ]);

        return response()->json([
            'message' => 'Subtarefa criada com sucesso',
            'dados' => $subtarefa
        ], 201);

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
