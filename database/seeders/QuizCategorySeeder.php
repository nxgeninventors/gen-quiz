<?php

namespace Database\Seeders;

use App\Models\QuizCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => 'Geography', 'category_image_path' => 'images/geography.svg'],
            ["name" => 'History', 'category_image_path' => 'images/history.svg'],
            ["name" => 'Science', 'category_image_path' => 'images/science.svg'],
            ["name" => 'Space', 'category_image_path' => 'images/space.svg'],
            ["name" => 'Computer Science', 'category_image_path' => 'images/computer_science.svg'],
        ];

        foreach ($categories as $category) {
            QuizCategory::create($category);
        }
    }
}
