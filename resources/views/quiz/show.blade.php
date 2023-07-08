


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>
    <script>
        var questions = @json($questions);
    </script>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">
                <div id="question-container">
                    <h1 id="question" class="text-3xl font-sans font-bold text-gray-800 dark:text-gray-300 text-center mt-32 md:mt-48 lg:mt-64">
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

    <script>
    

        let currentQuestionIndex = 0; // Current question index
        let selectedAnswers = []; // Array to store selected answers

        // Get DOM elements
        const questionContainer = document.getElementById('question-container');
        const questionElement = document.getElementById('question');
        const answersElement = document.getElementById('question_options');
        const previousBtn = document.getElementById('previous-btn');
        const nextBtn = document.getElementById('next-btn');
        const finishBtn = document.getElementById('finish-btn');

        // Load question and answers
        function loadQuestion() {
            console.log(questions[currentQuestionIndex]);
            // return false;
            const currentQuestion = questions[currentQuestionIndex];
            questionElement.textContent = currentQuestion.question_text;

            // Clear previous answers
            answersElement.innerHTML = '';

            var html = ''
            // Display answers
            currentQuestion.options.forEach((answer, index) => {
                html += `<div class="q-option bg-gray-100 dark:bg-gray-900 mx-6 w-auto mb-4 rounded-md flex items-center">
                <input id="question_option_${index}" type="radio" name="answer" value="${index}" class="ml-5 dark:bg-gray-800">
                <label for="question_option_${index}" class="text-gray-700 dark:text-gray-400 text-lg ml-4">
                ${answer.option_text}
                </label>
                </div>`;
            });

            answersElement.innerHTML = html;


            previousBtn.style.display = 'none';
            nextBtn.style.display = 'none' 
            finishBtn.style.display = 'none' 

            // Update button states
            if (currentQuestionIndex !== 0) {
                previousBtn.style.display = 'inline-flex'
            } 

            if (currentQuestionIndex !== questions.length - 1) {
                nextBtn.style.display = 'inline-flex' 
            }

            if (!(currentQuestionIndex !== questions.length - 1 && !selectedAnswers[currentQuestionIndex])) {
                finishBtn.style.display = 'inline-flex' 
            }

            // Load selected answer if available
            if (selectedAnswers[currentQuestionIndex]) {
                const selectedAnswerIndex = selectedAnswers[currentQuestionIndex];
                const radioButtons = document.getElementsByName('answer');
                radioButtons[selectedAnswerIndex].checked = true;
            }
        }

        // Event listener for next button
        nextBtn.addEventListener('click', () => {
            const selectedAnswerIndex = document.querySelector('input[name="answer"]:checked');

            if (selectedAnswerIndex) {
                const answerIndex = parseInt(selectedAnswerIndex.value);
                selectedAnswers[currentQuestionIndex] = answerIndex;
                currentQuestionIndex++;
                loadQuestion();
            }
        });

        // Event listener for previous button
        previousBtn.addEventListener('click', () => {
            currentQuestionIndex--;
            loadQuestion();
        });

        // Event listener for finish button
        finishBtn.addEventListener('click', () => {
            const selectedAnswerIndex = document.querySelector('input[name="answer"]:checked');

            if (selectedAnswerIndex) {
                const answerIndex = parseInt(selectedAnswerIndex.value);
                selectedAnswers[currentQuestionIndex] = answerIndex;
            }

            // Save selected answers in local storage
            localStorage.setItem('selectedAnswers', JSON.stringify(selectedAnswers));

            // Disable buttons and show alert on page reload
            previousBtn.disabled = true;
            nextBtn.disabled = true;
            finishBtn.disabled = true;

            window.onbeforeunload = function () {
                return true; // Display alert when reloading the page
            };
        });

        // Load previously selected answers if available
        window.addEventListener('DOMContentLoaded', () => {
            const storedAnswers = localStorage.getItem('selectedAnswers');
            if (storedAnswers) {
                selectedAnswers = JSON.parse(storedAnswers);
            }
            loadQuestion();
        });

    </script>
</x-app-layout>