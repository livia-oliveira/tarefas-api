<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

class TarefasController extends Controller
{

    public function index(){
        return Tarefa::with('subtarefas')->get();
    }

}
