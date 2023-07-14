import notie from "../notification/notie";

export const quiz = (function() {

    function initalizeQuestions() {
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
                notie.hideAlerts()
                const answerIndex = parseInt(selectedAnswerIndex.value);
                selectedAnswers[currentQuestionIndex] = answerIndex;
                currentQuestionIndex++;
                loadQuestion();
            } else {
                notie.toast('alert', {
                    type: 'error',
                    text: 'Please choose ansewer and continue.',
                });
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
    }

    function warnUserOnReload () {
        try {
            window.addEventListener('beforeunload', function(event) {
                event.preventDefault();
                event.returnValue = 'Are you sure you want to leave this page?';
            });
        } catch (error) {
            
        }
        
    }

    function initializeTimer() {
        const quiz = window.quiz;
        const quizMinutes = document.getElementById('quiz_minutes');
        const quizSeconds = document.getElementById('quiz_seconds');
        if (typeof quiz != 'undefined' && typeof quiz.timeout != 'undefined') {
            console.log(quiz.timeout)
            let minutes = Number(quiz.timeout);
            let seconds = 0;

            let timer = setInterval(updateTimer, 1000);

            function updateTimer() {
                if (seconds > 0) {
                    seconds--;
                } else if (minutes > 0) {
                    minutes--;
                    seconds = 59;
                } else {
                    clearInterval(timer);
                    // submitQuizForm();
                }
                quizMinutes?.style.setProperty('--value', minutes)
                quizSeconds?.style.setProperty('--value', seconds)
            }

        }
    }

    // let counter = 10
    // setInterval(() => {
    //         if(counter>0){
    //             counter--
    //         }
    //     document.getElementById('counterElement').style.setProperty('--value', counter)
    // }, 1000)


    function init () {
        initalizeQuestions();
        warnUserOnReload();
        initializeTimer();
    }

    return {
        init
    }
})();