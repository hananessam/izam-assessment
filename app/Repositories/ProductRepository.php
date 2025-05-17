<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts;

class ProductRepository implements Contracts\ProductInterface
{
    public function getAllProducts(array $filters = [], array $sorts = [], int $perPage = 10, int $page = 1, array $with = []): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Product::query()
            ->when($filters, function ($query) use ($filters) {
                foreach ($filters as $key => $value) {
                    // name
                    if ($key === 'name') {
                        $query->where($key, 'like', '%' . $value . '%');
                        continue;
                    }

                    // price range
                    if ($key === 'price_min') {
                        $query->where('price', '>=', $value);
                        continue;
                    }

                    if ($key === 'price_max') {
                        $query->where('price', '<=', $value);
                        continue;
                    }

                    $query->where($key, $value);
                }
            })
            ->when($sorts, function ($query) use ($sorts) {
                foreach ($sorts as $key => $value) {
                    $query->orderBy($key, $value);
                }
            })
            ->with($with)
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
