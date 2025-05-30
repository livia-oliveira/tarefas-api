<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;

use App\Http\Requests\UpdateTarefaRequest;

use App\Http\Requests\UpdateStatusRequest;

use App\Http\Requests\StoreTarefaRequest;


class TarefasController extends Controller
{
    use ApiResponse;

    public function index(){
       $tarefas = Tarefa::with('subtarefas')->get();
       return response()->json([
        'message' => 'Lista de tarefas recuperada com sucesso',
        'data' => $tarefas
       ], 200);
    }

    public function store(StoreTarefaRequest $request){

        $dados = $request->only('titulo');

        $tarefa = Tarefa::create([
            'titulo' => $dados['titulo'],
            'concluida' => false
        ]);

        return response()->json([
            'message' => 'Tarefa criada com sucesso!',
            'data' => $tarefa
        ], 201);

    }

    public function show($id){
        $tarefa = Tarefa::with('subtarefas')->find($id);

        if(!$tarefa){
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        return response()->json([
            'message' => 'Tarefa recuperada com sucesso',
            'data' => $tarefa
        ],200);
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

        $valor = $request->boolean('concluida');
        $tarefa->concluida = $valor;
        $tarefa->save();

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

    public function destroyAll(){
        $tarefas = Tarefa::all();

        if($tarefas->isEmpty()){
            return response()->json([
                'message' => 'Nenhuma tarefa encontrada para exclusão.'
            ], 404);
        }

        foreach($tarefas as $tarefa){
            $tarefa->delete();
        }

        return response()->json([
            'message' => 'Todas as tarefas foram excluidas com sucesso'
        ],200);
    }

}
