<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;

use App\Http\Requests\UpdateTarefaRequest;

use App\Http\Requests\UpdateStatusRequest;


class TarefasController extends Controller
{
    use ApiResponse;

    public function index(){
       $tarefas = Tarefa::with('subtarefas')->get();
       return $this->success($tarefas);
    }

    public function store(Request $request){
        $tarefa = Tarefa::create($request->only(['titulo', 'concluida']));
        return $this->success($tarefa, 'Tarefa criada com sucesso', 201);

    }

    public function show(UpdateTarefaRequest $request, $id){

    }

    public function update(UpdateTarefaRequest $request, $id){
        $tarefa = Tarefa::find($id);

        if(!$tarefa){
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        if($request->has('titulo')){
            $tarefa->titulo = $request->input('titulo');
        }


        if($request->has('concluida')){
            $valor = $request->boolean('concluida');
            $tarefa->concluida = $valor;

             foreach ($tarefa->subtarefas as $subtarefa){
                $subtarefa->concluida = $valor;
                $subtarefa->save();
            }

        }

        $tarefa->save();

        return response()->json([
            'message' => 'Tarefa atualizada com sucesso!',
            'data' => $tarefa->load('subtarefas')
        ]);

    }

    public function alterarStatus(UpdateStatusRequest $request, $id){

        $tarefa = Tarefa::find($id);

        if(!$tarefa){
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        $concluida = (bool) $request->input('concluida');

        $tarefa->concluida = $concluida;
        $tarefa->save();

        if($concluida){
            foreach($tarefa->subtarefas as $subtarefa){
                $subtarefa->concluida = true;
                $subtarefa->save();
            }
        }

        return response()->json([
            'message' => 'Status atualizado com sucesso!',
            'data' => $tarefa->load('subtarefas')
        ], 200);
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
