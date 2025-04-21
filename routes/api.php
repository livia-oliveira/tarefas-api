<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\SubtarefasController;

Route::get('/tarefas', [TarefasController::class, 'index']);
Route::post('/tarefas', [TarefasController::class, 'store']);
