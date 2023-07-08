


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4">
                @foreach($quizzes as $quiz)
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
                @endforeach  
            </div>

            @if((count($quizzes)) === 0)
            <div class="flex justify-center items-center">
                <h2 class="font-semibold text-xl text-red-600 dark:text-gray-200 leading-tight">
                    No quiz found for this category.
                </h2>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>