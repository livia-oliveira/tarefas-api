<?php

namespace App\Traits;

trait ApiResponse{
    protected function success($data = null, $message = 'Operação realizada com sucesso', $code = 200){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error($data = null, $message = 'Ocorreu um erro', $code = 500){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }


}
