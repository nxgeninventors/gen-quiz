import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// At the component you want to use confetti
import ConfettiGenerator from "confetti-js";

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    console.log("addEventListener");

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
});
  

