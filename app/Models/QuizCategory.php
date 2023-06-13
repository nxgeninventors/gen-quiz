<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_image_path'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'quiz_category_id');
    }

    public static function getCategories()
    {
        return self::select('id', 'name', 'category_image_path')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
