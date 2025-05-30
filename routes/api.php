<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\SubtarefasController;

Route::get('/tarefas', [TarefasController::class, 'index']);
Route::post('/tarefas', [TarefasController::class, 'store']);
Route::get('/tarefas/{id}', [TarefasController::class, 'show']);
Route::put('/tarefas/{id}', [TarefasController::class, 'update']);
Route::delete('/tarefas/{id}', [TarefasController::class, 'destroy']);
Route::delete('/tarefas', [TarefasController::class, 'destroyAll']);
Route::patch('/tarefas/{id}/concluida', [TarefasController::class, 'alterarStatus']);

Route::get('/subtarefas', [SubtarefasController::class, 'index']);
Route::post('/subtarefas', [SubtarefasController::class, 'store']);
Route::get('/subtarefas/{id}', [SubtarefasController::class, 'show']);
Route::put('/subtarefas/{id}', [SubtarefasController::class, 'update']);
Route::delete('/subtarefas/{id}', [SubtarefasController::class, 'destroy']);
Route::delete('/subtarefas', [SubtarefasController::class, 'destroyAll']);
Route::patch('/subtarefas/{id}/concluida', [SubtarefasController::class, 'alterarStatus']);
