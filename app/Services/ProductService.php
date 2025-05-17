<?php

namespace App\Services;

use App\Repositories\Contracts\ProductInterface as ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
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
     * Get all products with filters, sorts, pagination.
     *
     * @param Request $request
     * @return Collection|LengthAwarePaginator
     */
    public function getAllProducts(Request $request): Collection|LengthAwarePaginator
    {
        $cacheKey = 'products_' . md5(json_encode($request->all()));
        $products = cache()->remember($cacheKey, 60, function () use ($request) {
            return $this->productRepository->getAllProducts(
                $request->input('filters', []),
                $request->input('sorts', ['created_at' => 'desc']),
                $request->input('per_page', 10),
                $request->input('page', 1),
                ['media']
            );
        });
        return $products;
    }
}