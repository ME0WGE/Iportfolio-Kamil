<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avatar::insert([
            [
                'image' => 'storage/assets/my-profile-img.jpg',
                'about_id' => '1'
            ],
        ]);
    }
}
