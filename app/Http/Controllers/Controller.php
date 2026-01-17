<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function successResponse($data, int $statusCode = 200)
    {
        return response()->json(['success' => true, 'data' => $data], $statusCode);
    }
}
