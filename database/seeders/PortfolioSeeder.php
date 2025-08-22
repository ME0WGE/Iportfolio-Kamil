<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::insert([
            [
                'img' => 'storage/assets/app-1.jpg',
                'filter' => 'app',
            ],
            [
                'img' => 'storage/assets/product-1.jpg',
                'filter' => 'product',
            ],
            [
                'img' => 'storage/assets/branding-2.jpg',
                'filter' => 'branding',
            ],
            [
                'img' => 'storage/assets/books-1.jpg',
                'filter' => 'books',
            ],
            [
                'img' => 'storage/assets/app-2.jpg',
                'filter' => 'app',
            ],
            [
                'img' => 'storage/assets/product-2.jpg',
                'filter' => 'product',
            ],
            [
                'img' => 'storage/assets/books-2.jpg',
                'filter' => 'books',
            ],
            [
                'img' => 'storage/assets/books-3.jpg',
                'filter' => 'books',
            ],
            [
                'img' => 'storage/assets/branding-3.jpg',
                'filter' => 'branding',
            ]
        ]);
    }
}
