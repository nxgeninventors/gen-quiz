<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_types')->insert([
            ['name' => 'Multiple Choice'],
            ['name' => 'True/False'],
            ['name' => 'Fill in the Blanks'],
            ['name' => 'Matching'],
            ['name' => 'Image-based Questions'],
            ['name' => 'Short Answer'],
        ]);
    }
}
