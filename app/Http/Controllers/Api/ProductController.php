<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth:api')->only(['store', 'update']);
        $this->productService = $productService;
    }

    public function store(StoreProductRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $product = $this->productService->create($data);

        return new ProductResource($product);
    }

    public function index(GetProductsRequest $request)
    {
        $data = $request->validated();
        $products = $this->productService->list($data);

        return ProductResource::collection($products);
    }

    public function destroy(Product $product) {
        $this->authorize('destroy', $product);
        $product->delete();

        return response()->noContent();
    }

    public function show(Product $product) {

        return new ProductResource($product);
    }
}
