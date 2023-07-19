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
        // $multipleChoiceQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'Multiple Choice')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $multipleChoiceQuestionTypeId,
        //         'question_text' => 'What is the capital of France?',
        //         'difficulty' => 'easy',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more multiple choice questions
        // ]);

        // $multipleChoiceQuestionId = DB::table('questions')
        //     ->where('question_text', 'What is the capital of France?')
        //     ->value('id');

        // DB::table('question_options')->insert([
        //     [
        //         'question_id' => $multipleChoiceQuestionId,
        //         'option_text' => 'Paris',
        //         'is_correct' => true,
        //     ],
        //     [
        //         'question_id' => $multipleChoiceQuestionId,
        //         'option_text' => 'London',
        //         'is_correct' => false,
        //     ],
        //     // Add more options for the multiple choice question
        // ]);

        // // True/False
        // $trueFalseQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'True/False')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $trueFalseQuestionTypeId,
        //         'question_text' => 'The Earth is flat.',
        //         'difficulty' => 'medium',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more true/false questions
        // ]);

        // // Fill in the Blanks
        // $fillInTheBlanksQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'Fill in the Blanks')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $fillInTheBlanksQuestionTypeId,
        //         'question_text' => 'The capital of India is ____.',
        //         'difficulty' => 'difficult',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more fill in the blanks questions
        // ]);

        // // Matching
        // $matchingQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'Matching')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $matchingQuestionTypeId,
        //         'question_text' => 'Match the programming language with its corresponding logo.',
        //         'difficulty' => 'medium',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more matching questions
        // ]);

        // $matchingQuestionId = DB::table('questions')
        //     ->where('question_text', 'Match the programming language with its corresponding logo.')
        //     ->value('id');

        // DB::table('matching_options')->insert([
        //     [
        //         'question_id' => $matchingQuestionId,
        //         'option_text' => 'PHP',
        //         'matching_text' => 'Logo 1',
        //     ],
        //     [
        //         'question_id' => $matchingQuestionId,
        //         'option_text' => 'JavaScript',
        //         'matching_text' => 'Logo 2',
        //     ],
        //     // Add more options and matching texts for the matching question
        // ]);

        // // Image-based Questions
        // $imageBasedQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'Image-based Questions')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $imageBasedQuestionTypeId,
        //         'question_text' => 'Which animal is shown in the image?',
        //         'difficulty' => 'easy',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more image-based questions
        // ]);

        // // Short Answer
        // $shortAnswerQuestionTypeId = DB::table('question_types')
        //     ->where('name', 'Short Answer')
        //     ->value('id');

        // DB::table('questions')->insert([
        //     [
        //         'question_type_id' => $shortAnswerQuestionTypeId,
        //         'question_text' => 'What is the full form of PHP?',
        //         'difficulty' => 'difficult',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     // Add more short answer questions
        // ]);



        $data = <<<CSV
            "id","question_type_id","question_text","difficulty","created_at","updated_at"
            1,1,"Choose the word that is a synonym for ""happy"":",easy,,
            2,1,"Select the word that is a synonym for ""big"":",easy,,
            3,1,"Which word is a synonym for ""beautiful""?",easy,,
            4,1,"Identify the synonym for ""angry"":",easy,,
            5,1,"Which word is a synonym for ""tired""?",easy,,
            6,1,"Choose the word that is an antonym for ""hot"":",easy,,
            7,1,"Select the word that is an antonym for ""fast"":",easy,,
            8,1,"Which word is an antonym for ""happy""?",easy,,
            9,1,"Identify the antonym for ""big"":",easy,,
            10,1,"Which word is an antonym for ""beautiful""?",easy,,
            11,1,"In the sentence ""The cat chased the mouse,"" what is the subject?",easy,,
            12,1,"Identify the verb in the sentence ""She sings beautifully.""",easy,,
            13,1,"What is the object in the sentence ""He ate an apple""?",easy,,
            14,1,"In the sentence ""They are playing soccer,"" what is the subject?",easy,,
            15,1,"Identify the verb in the sentence ""I write letters to my friends.""",easy,,
            16,1,"Choose the word that is closest in meaning to the given word: Word: Eminent",medium,,
            17,1,"Which word is a synonym for ""quintessential""?",medium,,
            18,1,"Select the word that is most similar in meaning to ""ephemeral"":",medium,,
            19,1,"Which word is synonymous with ""exquisite""?",medium,,
            20,1,"Identify the synonym for ""ubiquitous"":",medium,,
            21,1,Choose the word that is the opposite in meaning to the given word:,medium,,
            22,1,"Which word is an antonym for ""verbose""?",medium,,
            23,1,"Select the word that is most opposite in meaning to ""frugal"":",medium,,
            24,1,"Which word is antonymous to ""ephemeral""?",medium,,
            25,1,"Identify the antonym for ""mitigate"":",medium,,
            26,1,Select the sentence that follows the SVO sentence structure:,medium,,
            27,1,Which sentence follows the SVO sentence structure?,medium,,
            CSV;

            $rows = explode("\n", $data);
            $header = str_getcsv(array_shift($rows));
            $seedData = [];

            foreach ($rows as $row) {
                $rowData = str_getcsv($row);
                $seedData[] = array_combine($header, $rowData);
            }
            DB::table('questions')->insert($seedData);

            $options = <<<CSV
            "id","question_id","option_text","is_correct","created_at","updated_at"
            3,1,Angry,0,,
            4,1,Worried,0,,
            5,2,Tiny,0,,
            6,2,Large,1,,
            7,2,Small,0,,
            8,2,Short,0,,
            9,3,Ugly,0,,
            10,3,Pretty,1,,
            11,3,Boring,0,,
            12,3,Difficult,0,,
            13,4,Happy,0,,
            14,4,Sad,0,,
            15,4,Furious,1,,
            16,4,Calm,0,,
            17,5,Energetic,0,,
            18,5,Sleepy,1,,
            19,5,Active,0,,
            20,5,Excited,0,,
            21,6,Cold,1,,
            22,6,Warm,0,,
            23,6,Cool,0,,
            24,6,Spicy,0,,
            25,7,Slow,1,,
            26,7,Quick,0,,
            27,7,Rapid,0,,
            28,7,Swift,0,,
            29,8,Sad,1,,
            30,8,Joyful,0,,
            31,8,Excited,0,,
            32,8,Pleased,0,,
            33,9,Tiny,0,,
            34,9,Large,0,,
            35,9,Small,1,,
            36,9,Huge,0,,
            37,10,Ugly,1,,
            38,10,Pretty,0,,
            39,10,Gorgeous,0,,
            40,10,Lovely,0,,
            41,11,Cat,1,,
            42,11,Chased,0,,
            43,11,Mouse,0,,
            44,11,The,0,,
            45,12,She,0,,
            46,12,Sings,1,,
            47,12,Beautifully,0,,
            48,12,None of the above,0,,
            49,13,He,0,,
            50,13,Ate,0,,
            51,13,An,0,,
            52,13,Apple,1,,
            53,14,They,1,,
            54,14,Are,0,,
            55,14,Playing,0,,
            56,14,Soccer,0,,
            57,15,I,0,,
            58,15,Write,1,,
            59,15,Letters,0,,
            60,15,Friends,0,,
            61,16,Famous,1,,
            62,16,Mediocre,0,,
            63,16,Inferior,0,,
            64,16,Anonymous,0,,
            65,17,Typical,0,,
            66,17,Ordinary,0,,
            67,17,Atypical,0,,
            68,17,Extraordinary,1,,
            69,18,Fleeting,1,,
            70,18,Enduring,0,,
            71,18,Permanent,0,,
            72,18,Lasting,0,,
            73,19,Dull,0,,
            74,19,Beautiful,1,,
            75,19,Hideous,0,,
            76,19,Unattractive,0,,
            77,20,Scarce,0,,
            78,20,Rare,0,,
            79,20,Common,1,,
            80,20,Uncommon,0,,
            81,21,Malevolent,1,,
            82,21,Kind,0,,
            83,21,Generous,0,,
            84,21,Compassionate,0,,
            85,22,Concise,1,,
            86,22,Wordy,0,,
            87,22,Loquacious,0,,
            88,22,Garrulous,0,,
            89,23,Extravagant,1,,
            90,23,Economical,0,,
            91,23,Thrifty,0,,
            92,23,Prudent,0,,
            93,24,Transient,0,,
            94,24,Lasting,1,,
            95,24,Temporary,0,,
            96,24,Fleeting,0,,
            97,25,Aggravate,1,,
            98,25,Worsen,0,,
            99,25,Alleviate,0,,
            100,25,Intensify,0,,
            101,26,"The sun set over the horizon, painting the sky with hues of orange and pink.",0,,
            102,26,"Running along the beach, she felt the cool breeze against her face.",0,,
            103,26,"Throughout the night, the storm raged with thunder and lightning.",0,,
            104,26,"Being a talented musician, he played the piano effortlessly.",1,,
            105,27,"The mountain peak, covered in snow, stood majestically against the clear blue sky.",0,,
            106,27,"The scent of freshly baked bread wafted through the air, making her hungry.",0,,
            107,27,"Walking through the forest, she discovered a hidden waterfall.",0,,
            108,27,"Delighted by the news, they jumped for joy",1,,
            CSV;

            $rows = explode("\n", $options);
            $header = str_getcsv(array_shift($rows));
            $seedData = [];

            foreach ($rows as $row) {
                $rowData = str_getcsv($row);
                $seedData[] = array_combine($header, $rowData);
            }
            DB::table('question_options')->insert($seedData);

            $quizzes = <<<CSV
            "id","quiz_name", "timeout","quiz_image","quiz_type","description","quiz_category_id","created_at","updated_at"
            1,Pre-test, 30,https://images.unsplash.com/photo-1634128221889-82ed6efebfc3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80,pre-test,This is prelevel test to identify the level of knowledge of student,1,,
            2,English- test1, 30,https://images.unsplash.com/photo-1451226428352-cf66bf8a0317?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80,test,Level -1,1,,
            CSV;

            $rows = explode("\n", $quizzes);
            $header = str_getcsv(array_shift($rows));
            $seedData = [];

            foreach ($rows as $row) {
                $rowData = str_getcsv($row);
                $seedData[] = array_combine($header, $rowData);
            }
            DB::table('quizzes')->insert($seedData);

            $quiz_question_mapping = <<<CSV
            "id","question_id","quiz_id","created_at","updated_at"
            1,1,1,,
            2,2,1,,
            3,3,1,,
            4,4,1,,
            5,5,1,,
            6,6,1,,
            7,7,1,,
            8,8,1,,
            9,9,1,,
            10,10,1,,
            11,11,1,,
            12,12,1,,
            13,13,1,,
            14,14,1,,
            15,15,1,,
            16,16,1,,
            17,17,1,,
            18,18,1,,
            19,19,1,,
            20,20,1,,
            21,21,1,,
            22,22,1,,
            23,23,1,,
            24,24,1,,
            25,25,1,,
            26,26,1,,
            27,27,1,,
            28,1,2,,
            29,2,2,,
            30,3,2,,
            31,4,2,,
            32,5,2,,
            33,6,2,,
            34,7,2,,
            35,8,2,,
            36,9,2,,
            37,10,2,,
            38,11,2,,
            39,12,2,,
            40,13,2,,
            41,14,2,,
            42,15,2,,
            43,16,2,,
            44,17,2,,
            45,18,2,,
            46,19,2,,
            47,20,2,,
            48,21,2,,
            49,22,2,,
            50,23,2,,
            51,24,2,,
            52,25,2,,
            53,26,2,,
            54,27,2,,
            CSV;

            $rows = explode("\n", $quiz_question_mapping);
            $header = str_getcsv(array_shift($rows));
            $seedData = [];

            foreach ($rows as $row) {
                $rowData = str_getcsv($row);
                $seedData[] = array_combine($header, $rowData);
            }
            DB::table('question_quizzes')->insert($seedData);

    }
}
