<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Quiz;
use App\Models\QuizCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $quizzes = Quiz::where("quiz_type", "pre-test")->get();

    return view('welcome', compact('quizzes'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category', [DashboardController::class, 'category'])->name('category');
    // Route::get('/question', function () {
    //     return view('question');
    // })->name('question');

    // Route::get('/results', function () {
    //     return view('results');
    // })->name('results');

    Route::resource('tests', QuizController::class);

    Route::get('test/{category_id}/{quiz_id}', [QuizController::class, 'start']);
    Route::get('test/{category_id}', [QuizController::class, 'show_quizzes']);

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
