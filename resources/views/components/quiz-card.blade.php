@props(['quiz'])

<div class="card w-96 bg-base-100 shadow-xl mb-4">
    <figure><img src="{{ $quiz->quiz_image }}" alt="{{ $quiz->quiz_name }}" /></figure>
    <div class="card-body">
        <h2 class="card-title">{{ $quiz->quiz_name }}</h2>
        <p>{{ $quiz->description }}</p>
        <div class="card-actions justify-end">
        <a href="{{ url('/quizzes').'/'.$quiz->category->id.'/'.$quiz->id }}" class="btn btn-primary">Take Test</a>
        </div>
    </div>
</div>