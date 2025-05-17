<?php

namespace App\Repositories\Contracts;

interface ProductInterface
{
    public function getAllProducts(array $filters = [], array $sorts = [], int $perPage = 10, int $page = 1);
}