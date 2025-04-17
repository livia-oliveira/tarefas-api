<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('subtarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->enum('status', ['pendente', 'em progresso', 'concluida'])->default('pendente');
            $table->foreignId('tarefa_id')->constrained('tarefas')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('subtarefas');
    }
};
