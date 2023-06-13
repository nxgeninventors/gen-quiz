<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SampleQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Multiple Choice
        $multipleChoiceQuestionTypeId = DB::table('question_types')
            ->where('name', 'Multiple Choice')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $multipleChoiceQuestionTypeId,
                'question_text' => 'What is the capital of France?',
                'difficulty' => 'easy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more multiple choice questions
        ]);

        $multipleChoiceQuestionId = DB::table('questions')
            ->where('question_text', 'What is the capital of France?')
            ->value('id');

        DB::table('question_options')->insert([
            [
                'question_id' => $multipleChoiceQuestionId,
                'option_text' => 'Paris',
                'is_correct' => true,
            ],
            [
                'question_id' => $multipleChoiceQuestionId,
                'option_text' => 'London',
                'is_correct' => false,
            ],
            // Add more options for the multiple choice question
        ]);

        // True/False
        $trueFalseQuestionTypeId = DB::table('question_types')
            ->where('name', 'True/False')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $trueFalseQuestionTypeId,
                'question_text' => 'The Earth is flat.',
                'difficulty' => 'medium',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more true/false questions
        ]);

        // Fill in the Blanks
        $fillInTheBlanksQuestionTypeId = DB::table('question_types')
            ->where('name', 'Fill in the Blanks')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $fillInTheBlanksQuestionTypeId,
                'question_text' => 'The capital of India is ____.',
                'difficulty' => 'difficult',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more fill in the blanks questions
        ]);

        // Matching
        $matchingQuestionTypeId = DB::table('question_types')
            ->where('name', 'Matching')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $matchingQuestionTypeId,
                'question_text' => 'Match the programming language with its corresponding logo.',
                'difficulty' => 'medium',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more matching questions
        ]);

        $matchingQuestionId = DB::table('questions')
            ->where('question_text', 'Match the programming language with its corresponding logo.')
            ->value('id');

        DB::table('matching_options')->insert([
            [
                'question_id' => $matchingQuestionId,
                'option_text' => 'PHP',
                'matching_text' => 'Logo 1',
            ],
            [
                'question_id' => $matchingQuestionId,
                'option_text' => 'JavaScript',
                'matching_text' => 'Logo 2',
            ],
            // Add more options and matching texts for the matching question
        ]);

        // Image-based Questions
        $imageBasedQuestionTypeId = DB::table('question_types')
            ->where('name', 'Image-based Questions')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $imageBasedQuestionTypeId,
                'question_text' => 'Which animal is shown in the image?',
                'difficulty' => 'easy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more image-based questions
        ]);

        // Short Answer
        $shortAnswerQuestionTypeId = DB::table('question_types')
            ->where('name', 'Short Answer')
            ->value('id');

        DB::table('questions')->insert([
            [
                'question_type_id' => $shortAnswerQuestionTypeId,
                'question_text' => 'What is the full form of PHP?',
                'difficulty' => 'difficult',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Add more short answer questions
        ]);
    }
}
