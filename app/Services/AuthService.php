<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Contracts\ProductInterface as ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthService
{
    /**
     * Create instance.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(public ProductRepository $productRepository)
    {
    }

    /**
     * Refresh the token for the authenticated user.
     *
     * @param Request $request
     * @return User
     */
    public function refreshToken(User $user): array|null
    {
        if (!$user) {
            return null;
        }

        return [
            'user' => UserResource::make($user),
            'token' => $user->createToken('auth_token')->plainTextToken,
            'expires_at' => now()->addMinutes(config('sanctum.expiration')),
        ];
    }
}