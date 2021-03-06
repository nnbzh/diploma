<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\GetCategoriesRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(GetCategoriesRequest $request)
    {
        $data       = $request->validated();
        $categories = $this->categoryService->list($data);

        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        $products = $category->products()->paginate();
        $category->setRelation('products', $products);

        return new CategoryResource($category);
    }
}
