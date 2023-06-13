<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_quizzes');
    }

    public function category()
    {
        return $this->belongsTo(QuizCategory::class, 'quiz_category_id');
    }
}