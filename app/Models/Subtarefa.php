<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarefa extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'concluida', 'tarefa_id'];

    protected $casts = [
        'concluida' => 'boolean',
    ];

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class);
    }
}
