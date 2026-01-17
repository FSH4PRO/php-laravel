<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->service->register($request->validated());

        return $this->successResponse($response, 201);
    }

    public function login(LoginRequest $request)
    {
        $result = $this->service->login($request->validated());
        return $this->successResponse($result, 200);
    }

    public function logout(Request $request)
    {
        $this->service->logout($request);
        return $this->successResponse('Logged out', 200);
    }

    public function me()
    {
        return $this->successResponse(auth()->user());
    }
}
