<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@bloomco.test'],
            [
                'name' => 'Admin Bloom',
                'password' => 'password123',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'owner@bloomco.test'],
            [
                'name' => 'Owner Bloom',
                'password' => 'password123',
                'role' => 'owner',
            ]
        );

        $products = [
            'Mawar' => [
                ['FLR001', 'Mawar Merah', 15000, 30],
                ['FLR002', 'Mawar Putih', 15000, 25],
            ],
            'Lily' => [
                ['FLR003', 'Lily Putih', 25000, 15],
            ],
            'Anggrek' => [
                ['FLR004', 'Anggrek Ungu', 35000, 12],
            ],
            'Tulip' => [
                ['FLR005', 'Tulip Pink', 30000, 20],
            ],
            'Matahari' => [
                ['FLR006', 'Bunga Matahari', 18000, 18],
            ],
        ];

        foreach ($products as $categoryName => $items) {
            $category = Category::firstOrCreate([
                'name' => $categoryName,
            ]);

            foreach ($items as [$sku, $name, $price, $stock]) {
                Product::updateOrCreate(
                    ['sku' => $sku],
                    [
                        'category_id' => $category->id,
                        'name' => $name,
                        'price' => $price,
                        'stock' => $stock,
                    ]
                );
            }
        }
    }
}