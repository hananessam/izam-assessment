<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\OrderProduct::factory()
            ->count(50)
            ->create();
    }
}
