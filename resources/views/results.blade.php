


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-header class="mt-32 md:mt-48 lg:mt-64">Your score is <span class="font-bold text-green-500">75%</span> </x-header>
                <div class="flex items-center mt-4 mb-16 flex-col">
                    <p class="text-2xl">Congrats!!!</p>
                    <div class="flex mt-4">
                        <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Play Again
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <canvas id="confetti"></canvas>
</x-app-layout>