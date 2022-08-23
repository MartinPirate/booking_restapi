<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductRepositoryInterface
{

    public function getProductById($id): Product
    {
        return Product::whereId($id)->first();
    }

    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductBookings($productId): array
    {
        // TODO: Implement getProductBookings() method.
    }

    public function getAvailableProducts(): array
    {
        // TODO: Implement getAvailableProducts() method.
    }

    public function getUnavailableProducts(): array
    {
        // TODO: Implement getUnavailableProducts() method.
    }

    public function getRemainingSlots($productId): int
    {
        // TODO: Implement getRemainingSlots() method.
    }
}
