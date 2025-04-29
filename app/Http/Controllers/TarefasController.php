<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;


class TarefasController extends Controller
{
    use ApiResponse;

    public function index(){
       $tarefas = Tarefa::with('subtarefas')->get();
       return $this->success($tarefas);
    }

    public function store(Request $request){
        $tarefa = Tarefa::create($request->only(['titulo', 'status']));
        return $this->success($tarefa, 'Tarefa criada com sucesso', 201);

    }

    public function show(Tarefa $tarefa){
        return $this->success($tarefa->load('subtarefas'), 'Tarefa encontrada');
    }
    public function update(Request $request, Tarefa $tarefa){
        $tarefa->update($request->only(['titulo', 'status']));
        return $this->success($tarefa, 'Tarefa atualizada com sucesso');
    }

    public function destroy(Tarefa $tarefa){
        $tarefa->delete();
        return $this->success(null, 'Tarefa excluida com sucesso', 204);
    }


}
