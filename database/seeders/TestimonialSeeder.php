<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            [
                'comment' => 'CommentLorem-CommentLorem-CommentLorem-CommentLorem',
                'img' => 'storage/assets/testimonials-1.jpg',
                'name' => 'Name 1',
                'position' => 'Position 1',
            ],
            [
                'comment' => 'CommentLorem-CommentLorem-CommentLorem-CommentLorem',
                'img' => 'storage/assets/testimonials-2.jpg',
                'name' => 'Name 2',
                'position' => 'Position 2',
            ],
            [
                'comment' => 'CommentLorem-CommentLorem-CommentLorem-CommentLorem',
                'img' => 'storage/assets/testimonials-3.jpg',
                'name' => 'Name 3',
                'position' => 'Position 3',
            ],
            [
                'comment' => 'CommentLorem-CommentLorem-CommentLorem-CommentLorem',
                'img' => 'storage/assets/testimonials-5.jpg',
                'name' => 'Name 4',
                'position' => 'Position 4',
            ],
        ]);
    }
}
