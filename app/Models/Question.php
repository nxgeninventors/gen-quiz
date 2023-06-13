<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_type_id', 'question_text', 'difficulty'];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function matching_options()
    {
        return $this->hasMany(MatchingOption::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'question_quizzes');
    }
}
