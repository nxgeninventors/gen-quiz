export const DisableCtrl = (function() {

    function copyingText() {
        var body = document.body;
        body.oncopy = function(event) {
            event.preventDefault();
        };
    }

    function init () {
        copyingText();
    }

    return {
        init
    }

})