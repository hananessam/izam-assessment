<?php

namespace App\Repositories\Contracts;

interface CartInterface
{
    public function getCart($userId): array;

    public function addToCart($userId, array $data): array;

    public function removeFromCart($userId, array $data): void;
}