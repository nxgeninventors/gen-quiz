import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// At the component you want to use confetti
import ConfettiGenerator from "confetti-js";

import notie from 'notie'
window.notie  = notie;

// import { intializeEditor } from './plugins/textEditor';
import { quiz } from './quiz/quiz'
import { QuizCreateCtrl } from './quiz/create';
import { DisableCtrl } from './helpers/disable';

window.confirmDelete = function(event, formId) {
    console.log(event);
    event.preventDefault();
    
    notie.confirm({
        text: 'Are you sure you want to delete?',
    }, function() {
        try {
            const form = event.target.closest('form');
            form.submit();
        } catch (error) {
            console.error(error);
        }
    }, function() {
        return false;
    })
}



window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    

    function clear(confetti) {
        confetti.clear();
        confettiElement.remove()
    }

    // Code to be executed after the document has finished loading
    const confettiElement = document.getElementById("confetti");
    if (confettiElement) {
        var confettiSettings = { target: confettiElement };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();  

        // setTimeout(() => {
        //     clear(confetti);
        // }, 1000 * 10);


        document.addEventListener('click', function(event) {
            if (document.getElementById("confetti") && confetti) {
                clear(confetti);
            }
        });
    }

    // intializeEditor("editor", {body_class : "w-100"})
    // intializeEditor("editor-1", {body_class : ""})
    // intializeEditor("editor-2", {body_class : ""})
    // intializeEditor("editor-3", {body_class : ""})
    // intializeEditor("editor-4", {body_class : ""})

    const question_options = document.getElementById("question_options");
    if (question_options) {
        quiz.init();
    }

    const create_quiz = document.getElementById("create_quiz");
    if (create_quiz) {
        QuizCreateCtrl().init();
    }

    DisableCtrl().init()
});
  

