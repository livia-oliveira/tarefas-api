<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|in:pendente,em_andamento,concluida',
        ];
    }

    public function withValidator($validator)
    {

        $tarefa = $this->route('tarefa');

        $validator->after(function ($validator){
            if($tarefa && $tarefa->status === 'concluida'){
                $validator->errors()->add('status', 'Tarefas concluídas não podem ser editadas.');
            }
        });
    }

}
