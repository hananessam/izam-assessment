<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\Product;
use App\Repositories\Contracts;

class AuthRepository implements Contracts\AuthInterface
{
    public function login(array $credentials): array
    {
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'user' => UserResource::make($user),
                'token' => $token,
                'expires_at' => now()->addMinutes(config('sanctum.expiration')),
            ];
        }
        throw new \Exception('Invalid credentials');
    }

    public function logout(): void
    {
        auth()->logout();
    }
}