<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function create($data) {
        return $this->productRepo->create($data);
    }

    public function list($filters = []) {
        return $this->productRepo->list($filters);
    }
}
