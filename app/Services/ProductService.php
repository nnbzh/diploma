<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepo;
    protected ImageRepository $imageRepo;

    public function __construct(
        ProductRepository $productRepo,
        ImageRepository $imageRepo
    )
    {
        $this->productRepo = $productRepo;
        $this->imageRepo = $imageRepo;
    }

    public function create($data) {
        $images   = $data['images'] ?? [];
        $product  = $this->productRepo->create($data);
        $this->imageRepo->createForImageable($product, $images);

        return $product;
    }

    public function list($filters = []) {
        return $this->productRepo->list($filters);
    }
}
