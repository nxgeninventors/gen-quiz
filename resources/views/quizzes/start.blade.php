


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>
    <script>
        window.questions = @json($questions);
        window.quiz = @json($quiz);
    </script>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="flex justify-center mt-5">
                    <span class="countdown font-mono text-6xl">
                        <span id="quiz_minutes" style="--value:0;"></span>:
                        <span id="quiz_seconds" style="--value:0;"></span>
                    </span>
                </div>
                
                <div id="question-container">
                    <h1 id="question" class="text-3xl font-sans font-bold text-gray-800 dark:text-gray-300 text-center mt-32 md:mt-32 lg:mt-32">
                    </h1>
                    <div class="flex justify-center mt-16 mb-16">
                        <div class="bg-gray-50 dark:bg-gray-800 shadow-lg dark:shadow-dark rounded-2xl min-w-80 w-3/4">
                           <div id="question_options" class="pt-6 pb-2">
                           </div>
                        </div>
                     </div>

                    <div class="flex justify-center mt-16 mb-16">
                        <div class="flex gap-1 mb-16 min-w-80 w-3/4 justify-end">
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="previous-btn" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"  viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                            </svg>
                                  
                                  
                              &nbsp;
                              Previous
                            </button>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  id="next-btn">Next
                                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                            </button>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  id="finish-btn" disabled>Finish
                                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                            </button>


                           {{-- <a href="http://127.0.0.1:8000/results" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              Finish
                              <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                              </svg>
                           </a> --}}
                        </div>
                     </div>
                </div>

    
                @if((count($questions)) === 0)
                <div class="flex justify-center items-center">
                    <h2 class="font-semibold text-xl text-red-600 dark:text-gray-200 leading-tight">
                        No questions found for this Quiz.
                    </h2>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>