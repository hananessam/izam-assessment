<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Contracts\AuthInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(public AuthInterface $authRepository)
    {
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $user = $this->authRepository->login($credentials);
            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
    public function logout()
    {
        $this->authRepository->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
