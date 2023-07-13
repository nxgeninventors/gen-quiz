@props(['quiz'])

<div class="card w-96 bg-base-100 shadow-xl mb-4">
    <figure><img src="{{ asset('storage/quiz/'.$quiz->quiz_image)  }}" alt="{{ $quiz->quiz_name }}" /></figure>
    <div class="card-body">
        <h2 class="card-title">{{ $quiz->quiz_name }}</h2>
        <div class="badge badge-accent badge-outline">{{ $quiz->quiz_type }}</div>
        <div class="badge badge-primary badge-outline">Category : {{ $quiz->category->name }}</div>
        <p>{{ Str::limit($quiz->description , 200) }} </p>
        <div class="card-actions justify-end">
        <a href="{{ url('/test').'/'.$quiz->category->id.'/'.$quiz->id }}" class="btn btn-primary">Take Test</a>
        </div>
    </div>
</div>