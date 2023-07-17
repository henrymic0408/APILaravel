<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy
        $products = [[
            'name' => 'Laptop 123',
            'description' => 'Product Laptop Description',
            'price' => '1000',
            'image' => 'null',
            'category_id' => 1
        ],
        [
            'name' => "Tablet 123",
            'description' => "Product Tablet Description",
            'price' => '2000',
            'image' => 'null',
            'category_id' => 2
        ],
        [
            'name' => "Smartphone 123",
            'description' => "Product Smartphone Description",
            'price' => '3000',
            'image' => 'null',
            'category_id' => 3
        ]
        ];
        
        foreach($products as $product){
            \App\Models\Product::create($product);
        }
    }
}
