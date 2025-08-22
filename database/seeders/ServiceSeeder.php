<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'icon' => 'fa-solid fa-display',
                'title' => 'Service 1',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
            [
                'icon' => 'fa-solid fa-chart-column',
                'title' => 'Service 2',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
            [
                'icon' => 'fa-solid fa-earth-europe',
                'title' => 'Service 3',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
            [
                'icon' => 'fa-regular fa-image',
                'title' => 'Service 4',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
            [
                'icon' => 'fa-solid fa-sliders',
                'title' => 'Service 5',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
            [
                'icon' => 'fa-regular fa-calendar-days',
                'title' => 'Service 6',
                'text' => 'TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem-TextLorem',
            ],
        ]);
    }
}
