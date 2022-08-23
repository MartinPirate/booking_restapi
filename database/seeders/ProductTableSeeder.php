<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        for ($products = 0; $products < 100; $products++) {
            DB::table('products')->insert([
                'title' => fake()->sentence,
                'type' => fake()->randomElement([Product::EXCURSIONS, Product::CUSTOM_PACKAGES, Product::CRUISES, Product::TRANSFERS]),
                'description' => fake()->paragraph,
                'capacity' => fake()->numberBetween(10, 99),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
