<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::insert([
            [
                'street' => 'Place de la Minoterie',
                'number' => '10',
                'city' => 'Brussels',
                'zip' => '1000',
                'phone' => '+32 001 002 003',
                'email' => 'baldygakamil@gmail.com'
            ],
        ]);
    }
}
