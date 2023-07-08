<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg pb-8">
                {{-- <x-welcome />

                <div class="mt-8 mb-4 text-center">
                    <a href="{{ route('category') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Start Quiz
                    </a>
                </div> --}}

                <x-header class="mt-32 md:mt-48 lg:mt-64">Choose a category to get started:</x-header>
                <div class="flex flex-row flex-wrap justify-center mt-16  mb-32">
                    @foreach($categories as $category)
                        <x-category-card>
                            <x-slot name="category_id">{{ $category->id }}</x-slot>
                            <x-slot name="name">{{ $category->name }}</x-slot>
                            <x-slot name="category_image_path">{{ $category->category_image_path}}</x-slot>
                        </x-category-card>
                    @endforeach
                </div>
            </div>

            
        </div>
    </div>
</x-app-layout>
