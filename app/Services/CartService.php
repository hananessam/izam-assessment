<?php

namespace App\Services;

use App\Repositories\Contracts\CartInterface;

class CartService
{
    public function __construct(protected CartInterface $cartRepository)
    {
    }

    public function getCart($userId): array
    {
        return $this->cartRepository->getCart($userId);
    }

    public function addToCart($userId, array $data): array
    {
        return $this->cartRepository->addToCart($userId, $data);
    }

    public function removeFromCart($userId, array $data): void
    {
        $this->cartRepository->removeFromCart($userId, $data);
    }
}