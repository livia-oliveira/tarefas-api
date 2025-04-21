<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

class TarefasController extends Controller
{

    public function index(){
        return Tarefa::with('subtarefas')->get();
    }

    public function store(Request $request){
        $tarefa = Tarefa::create($request->only(['titulo', 'status']));
        return response()->json($tarefa, 201);

    }

    public function show(Tarefa $tarefa){
        return $tarefa->load('subtarefas');
    }

    public function update(Request $request, Tarefa $tarefa){
        $tarefa->update($request->only(['titulo', 'status']));
        return response()->json($tarefa);
    }


}
