<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Passport\Exceptions\AuthenticationException;

class AuthService
{
    /**
     * Register a new user (transaction + try-catch)
     *
     * @return array{user:User, token:string}
     */
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'active' => $data['active'] ?? true,
            ]);

            $token = $user->createToken('api-token')->accessToken;

            return [
                'user' => $user,
                'token' => $token,
            ];
        });
    }

    /**
     * Attempt login and return access token
     *
     * @return array{token:string, user:User}
     */
    public function login(array $credentials): array
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials');
        }

        if (! $user->active) {
            throw new AuthorizationException('User is inactive');
        }

        $token = $user->createToken('api-token')->accessToken;

        return ['token' => $token, 'user' => $user];
    }

    /**
     * Revoke current token
     */
    public function logout(Request $request): void
    {
        $user = $request->user();

        if ($user) {
            $request->user()->token()->revoke();
        }
    }
}
