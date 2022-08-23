<?php

namespace App\Interfaces;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{

    /**
     * @param $id
     * @return Product
     */
    public function getProductById($id): Product;


    /**
     * @return Collection
     */
    public function getAllProducts(): Collection;


    /**
     * @param $productId
     * @return array<Booking>
     */
    public function getProductBookings($productId): array;

    /**
     * @return array<Product>
     */
    public function getAvailableProducts(): array;

    /**
     * @return array<Product>
     */
    public function getUnavailableProducts(): array;


    /**
     * @param $productId
     * @return int
     */
    public function getRemainingSlots($productId): int;
}
