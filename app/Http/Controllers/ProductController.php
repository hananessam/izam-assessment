<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Create instance.
     *
     * @param ProductService $productService
     */
    public function __construct(public ProductService $productService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @param ProductsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsRequest $request)
    {
        $products = $this->productService->getAllProducts($request);
        return response()->json($products);
    }
}
