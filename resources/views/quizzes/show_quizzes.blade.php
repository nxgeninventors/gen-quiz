


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4">
                @foreach($quizzes as $quiz)
                    <x-quiz-card :quiz="$quiz"/>
                @endforeach  
            </div>

            @if((count($quizzes)) === 0)
            <div class="flex justify-center items-center">
                <h2 class="font-semibold text-xl text-red-600 dark:text-gray-200 leading-tight">
                    No test found for this category.
                </h2>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>