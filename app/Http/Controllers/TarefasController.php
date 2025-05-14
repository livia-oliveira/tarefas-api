<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;

use App\Http\Requests\UpdateTarefaRequest;


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

    public function update(UpdateTarefaRequest $request, Tarefa $tarefa){
        try{
            $dados = $request->only(['titulo', 'status']);
            $tarefa->update($dados);
            return response()->json([
                'message' => 'Tarefa atualizada com sucesso!',
                'data' => $tarefa
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar a tarefa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id){

        $tarefa = Tarefa::find($id);

        if(!$tarefa){
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        if($tarefa->status === 'concluida'){
            return response()->json([
                'message' => 'Tarefas concluídas não podem ser deletadas'
            ], 403);
        }

        try{
            $tarefa->delete();

            return response()->json([
                'message' => 'Tarefa deletada com sucesso.'
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao deletar tarefa.',
                'error' => $e->getMessage()
            ], 500);

        }
    }

}
