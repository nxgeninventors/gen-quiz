<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuiz extends Model
{
    use HasFactory;

    protected $table = 'student_quizzes';


    public static function getStudentQuizIds(int $user_id)
    {
        return self::where('user_id', $user_id)
                ->select("quiz_id")
                ->pluck('quiz_id')
                ->toArray();
    }
}
