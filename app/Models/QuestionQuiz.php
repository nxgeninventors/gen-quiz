<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionQuiz extends Model
{
    use HasFactory;

    protected $table = 'question_quizzes';
    protected $fillable = ['question_id', 'quiz_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
