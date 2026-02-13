<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function return_success($data = null, $additional = []): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $data] + $additional, 200);
    }

    protected function return_fail_message(?string $message = null, int $status = 400): JsonResponse
    {
        return response()->json(['success' => false, 'message' => $message], $status);
    }
}
