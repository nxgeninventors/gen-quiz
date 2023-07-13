<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AssignTestsRequest;
use App\Models\StudentQuiz;

class AssignTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $user_id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $userQuizIds = StudentQuiz::getStudentQuizIds($user->id);

        $tests = Quiz::getTests();
        return view('assign-test.edit', compact('user', 'tests', 'userQuizIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignTestsRequest $request, int $id)
    {
        $user = User::findOrFail($id);
        StudentQuiz::where('user_id', $user->id)->delete();
        $user->quizzes()->syncWithoutDetaching($request->get('quiz_ids')); 

        return redirect()->route('users.index')
                    ->with('message', __('Quizzes are assigned successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
