<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService)
    {
    }

    public function index(): JsonResponse
    {
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cartItems = $this->cartService->getCart($userId);
        return response()->json($cartItems);
    }

    public function add(Request $request): JsonResponse
    {
        $userId = auth()->id();
        $this->cartService->addToCart($userId, $request->only('id', 'quantity'));
        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function remove(Request $request): JsonResponse
    {
        $userId = auth()->id();
        $this->cartService->removeFromCart($userId, $request->only(['id', 'quantity']));
        return response()->json(['message' => 'Product removed from cart successfully']);
    }
}
