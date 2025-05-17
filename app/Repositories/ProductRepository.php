<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts;

class ProductRepository implements Contracts\ProductInterface
{
    public function getAllProducts(array $filters = [], array $sorts = [], int $perPage = 10, int $page = 1)
    {
        return Product::query()
            ->when($filters, function ($query) use ($filters) {
                foreach ($filters as $key => $value) {
                    $query->where($key, $value);
                }
            })
            ->when($sorts, function ($query) use ($sorts) {
                foreach ($sorts as $key => $value) {
                    $query->orderBy($key, $value);
                }
            })
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
