<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('quiz_name');
            $table->string('quiz_image');
            $table->enum('quiz_type', ['pre-test', 'test']);
            $table->integer('timeout')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('quiz_category_id')->nullable();
            $table->foreign('quiz_category_id')->references('id')->on('quiz_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
