<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::insert([
            [
                'skill' => 'HTML',
                'pourcentage' => '90'
            ],
            [
                'skill' => 'CSS',
                'pourcentage' => '75'
            ],
            [
                'skill' => 'JavaScript',
                'pourcentage' => '100'
            ],
            [
                'skill' => 'React',
                'pourcentage' => '80'
            ],
            [
                'skill' => 'PHP',
                'pourcentage' => '65'
            ],
            [
                'skill' => 'Laravel',
                'pourcentage' => '70'
            ],
        ]);
    }
}
