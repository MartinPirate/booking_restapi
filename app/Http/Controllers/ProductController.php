<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ResponseAPI;

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    /**
     * Get a List of all Products
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        $products = $this->productRepository->getAllProducts();

        $products = ProductResource::collection($products);

        return $this->success('List of All Products', $products);

    }

}
