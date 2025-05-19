<?php

namespace App\Repositories;

use App\Http\Resources\CartProductResource;
use App\Repositories\Contracts;
use App\Repositories\Contracts\ProductInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cart;
use App\Models\CartProduct;

class CartRepository implements Contracts\CartInterface
{
    public function __construct(
        protected ProductInterface $productRepository,
        protected Cart $cart,
        protected CartProduct $cartProduct
    ) {
    }

    public function getCart($userId): array
    {
        $cart = $this->cart
            ->where('user_id', $userId)
            ->with(['products.product'])
            ->first();

        if (!$cart) {
            return [
                'cart' => [],
                'total' => 0,
                'count' => 0,
            ];
        }
        
        return [
            'cart' => CartProductResource::collection($cart->products),
            'total' => $cart->products->sum('total'),
            'count' => $cart->products->count(),
        ];
    }

    public function addToCart($userId, array $data): array
    {
        $product = $this->productRepository->getProductById($data['id']);
        if ($product) {
            $this->cart = $this->cart->firstOrCreate([
                'user_id' => $userId,
                'total' => $product->price * ($data['quantity'] ?? 1),
            ]);

            $this->cartProduct->updateOrCreate([
                'cart_id' => $this->cart->id,
                'product_id' => $data['id'],
                'price' => $product->price,
                'quantity' => $data['quantity'] ?? 1,
                'total' => $product->price * ($data['quantity'] ?? 1),
            ]);

            $this->cart->load('products.product');
        }

        return [
            'cart' => CartProductResource::collection($this->cart->products),
            'total' => $this->cart->products->sum('total'),
            'count' => $this->cart->products->count(),
        ];
    }

    public function removeFromCart($userId, array $data): void
    {
        $cart = $this->cart->where('user_id', $userId)->first();
        if ($cart) {
            $cartProduct = $this->cartProduct
                ->where('cart_id', $cart->id)
                ->where('product_id', $data['id'])
                ->first();

            if ($cartProduct) {
                $cartProduct->delete();
            }
        }
    }
}