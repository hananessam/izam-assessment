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
        \App\Models\Product::factory(100)->create();

        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $product->addMediaFromUrl('https://picsum.photos/600/400')->toMediaCollection();
        }
    }
}
