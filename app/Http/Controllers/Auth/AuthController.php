<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public AuthService $authServise)
    {
    }

    public function refreshToken(Request $request)
    {
        $user = $request->user();
        $data = $this->authServise->refreshToken($user);

        if (!$data) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        return response()->json($data, 200);
    }
}
