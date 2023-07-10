<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy
        $categories = [[
            'name' => 'Laptop',
            'description' => 'Laptop Description'
        ],
        [
            'name' => "Laptop",
            'description' => "Laptop Description"
        ],
        [
            'name' => "Laptop",
            'description' => "Laptop Description"
        ]
        ];
        
        foreach($categories as $category){
            \App\Models\Category::create($category);
        }
    }
}
