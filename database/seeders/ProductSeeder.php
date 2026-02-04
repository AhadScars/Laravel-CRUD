<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'This is a description for product ' . $i . '. High quality item with great features.',
                'price' => rand(10, 500) + (rand(0, 99) / 100),
                'image' => 'default.jpg'
            ]);
        }
    }
}
