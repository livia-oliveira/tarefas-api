<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;

use Illuminate\Http\Request;

use App\Traits\ApiResponse;

use App\Http\Requests\StoreSubtarefaRequest;

use App\Http\Requests\UpdateSubtarefaRequest;

use App\Http\Requests\UpdateStatusRequest;


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

    public function show($id)
    {
        $subtarefa = Subtarefa::find($id);

        if(!$subtarefa){
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        return response()->json([
            'message' => 'tarefa recuperada com sucesso',
            'data' => $subtarefa
        ],200);
    }

    public function update(UpdateSubtarefaRequest $request, $id)
    {
        $subtarefa = Subtarefa::find($id);

        if(!$subtarefa){
            return response()->json([
                'message' => 'Subtarefa não encontrada'
            ], 404);
        }

        if($request->has('titulo')){
            $subtarefa->titulo = $request->input('titulo');
        }

        if($request->has('concluida')){
            $valor = $request->boolean('concluida');
            $subtarefa->concluida = $valor;

        }

        $subtarefa->save();

        return response()->json([
            'message' => 'Subtarefa atualizada com sucesso',
            'data' => $subtarefa
        ],200);

    }

    public function alterarStatus(UpdateStatusRequest $request, $id){
        $subtarefa = Subtarefa::find($id);

        if(!$subtarefa){
            return response()->json([
                'message' => 'Subtarefa não encontrada'
            ], 404);
        }

        $valor = $request->boolean('concluida');
        $subtarefa->concluida = $valor;
        $subtarefa->save();

        return response()->json([
            'message' => 'Status atualizado com sucesso',
            'data' => $subtarefa
        ],200);
    }

    public function destroy($id)
    {
       $subtarefa = Subtarefa::find($id);

       if(!$subtarefa){
            return response()->json([
                'message' => 'Subtarefa não encontrada'
            ],404);
       }

       try{
            $subtarefa->delete();

            return response()->json([
                'message' => 'Subtarefa deletada com sucesso'
            ],200);
       }

       catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao excluir tarefa',
                'error' => $e->getMessage()
            ],500);
       }
    }

    public function destroyAll(){
        $subtarefas = Subtarefa::all();

        if($subtarefas->isEmpty()){
            return response()->json([
                'message' => 'Nenhuma subtarefa encontrada para exclusão.',
            ],404);
        }

        foreach($subtarefas as $subtarefa){
            $subtarefa->delete();
        }

        return response()->json([
            'message' => 'Todas as subtarefas foram excluidas com sucesso',
        ],200);


    }
}
