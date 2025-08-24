<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert([
            [
            'first_name' => 'Kamil',
            'last_name' => 'Baldyga',
            'subtitle' => 'loremloremloremloremloremloremloremlorem',
            'birthdate' => '29th of january 2001',
            'website' => 'website.com',
            'phone' => '+32 001 002 003',
            'city' => 'Brussels',
            'age' => '24',
            'degree' => 'degree',
            'email' => 'baldygakamil@gmail.com',
            'freelance' => 'freelance status',
            'subtext' => 'loremloremloremloremloremloremloremlorem'
            ],
        ]);
    }
}
