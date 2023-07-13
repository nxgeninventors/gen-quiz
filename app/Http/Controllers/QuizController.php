<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuizRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    protected $quiz_types = ['pre-test', 'test'];

    public function __construct()
    {
        $this->middleware('can:quiz start', ['only' => ['start']]);
        $this->middleware('can:quiz show_quizzes', ['only' => ['show_quizzes']]);
        
        $this->middleware('can:quiz list', ['only' => ['index', 'show']]);
        $this->middleware('can:quiz create', ['only' => ['create', 'store']]);
        $this->middleware('can:quiz edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:quiz delete', ['only' => ['destroy']]);

        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = (new Quiz)->newQuery();

        if (request()->has('search')) {
            $quizzes->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $quizzes->orderBy($attribute, $sort_order);
        } else {
            $quizzes->latest();
        }

        $quizzes = $quizzes->paginate(5)->onEachSide(2);

        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quiz_types = $this->quiz_types;
        $quizCategories = QuizCategory::getCategories();
        
        return view('quizzes.create', compact('quizCategories', 'quiz_types'));
    }

    public function upload_image(StoreQuizRequest|UpdateQuizRequest $request) {
        $imagePath = 'public/quiz';
        // Create the "expense" folder if it doesn't exist
        if (! Storage::exists($imagePath)) {
            Storage::makeDirectory($imagePath);
        }

        // Get the uploaded file
        if ($request->hasFile('quiz_image')) {
            $file = $request['quiz_image'];

            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();
            $newFileName = $timestamp . '.' . $extension;

            $file->storeAs($imagePath, $newFileName);
            return $newFileName;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        $data = $request->all();
        $data['quiz_image'] = $this->upload_image($request);

        # save
        Quiz::create($data);
        return redirect()->route('tests.index')
                        ->with('message', __('Quiz created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function start($category_id, $quiz_id)
    {
        $questions = Question::getQuestions($quiz_id);
        return view('quizzes.start', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {

        $quiz_types = $this->quiz_types;
        $quizCategories = QuizCategory::getCategories();
        
        return view('quizzes.edit', compact('quiz', 'quizCategories', 'quiz_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $data = $request->all();
        if ($request->hasFile('quiz_image')) {
            $data['quiz_image'] = $this->upload_image($request);
        }
        $quiz->update($data);

        return redirect()->route('tests.index')
                        ->with('message', __('Quiz updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_quizzes($category_id)
    {
        $user = auth()->user();
        $quizzes = Quiz::getQuizzes($category_id, $user);
        
        return view('quizzes.show_quizzes', compact('quizzes'));
    }

}
