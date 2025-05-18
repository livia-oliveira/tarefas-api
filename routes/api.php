<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\SubtarefasController;

Route::get('/tarefas', [TarefasController::class, 'index']);
Route::post('/tarefas', [TarefasController::class, 'store']);
Route::get('/tarefas/{tarefa}', [TarefasController::class, 'show']);
Route::put('/tarefas/{tarefa}', [TarefasController::class, 'update']);
Route::delete('/tarefas/{id}', [TarefasController::class, 'destroy']);
Route::patch('/tarefas/{id}/concluida', [TarefasController::class, 'alterarStatus']);

Route::get('/subtarefas', [SubtarefasController::class, 'index']);
Route::post('/subtarefas', [SubtarefasController::class, 'store']);
Route::get('/subtarefas/{id}', [SubtarefasController::class, 'show']);
Route::put('/subtarefas/{id}', [SubtarefasController::class, 'update']);
Route::delete('/subtarefas/{id}', [SubtarefasController::class, 'destroy']);
