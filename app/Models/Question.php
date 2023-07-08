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
        return $this->belongsTo(QuestionType::class, 'question_type_id');
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

    public static function getQuestions($quizId)
    {
        // return self::whereHas('category', function ($query) use ($quizCategoryId) {
        //             $query->where('id', $quizCategoryId);
        //         })
        //         ->inRandomOrder()
        //         ->take(25)
        //         ->get();

        return Question::inRandomOrder()
                    ->with('options')
                    ->whereHas('quizzes', function ($query) use ($quizId) {
                        $query->where('quiz_id', $quizId);
                    })
                    ->limit(25)
                    ->get();
    }
}
