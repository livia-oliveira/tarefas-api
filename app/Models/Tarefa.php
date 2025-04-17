<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{

    use HasFactory;

    protected $fillable = ['titulo', 'status'];

    public function subtarefas()
    {
        return $this->hasMany(Subtarefa::class);
    }
}
