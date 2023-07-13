export const QuizCreateCtrl = (function(){

    function initializeImagePreview() {
        const imageInput = document.getElementById('quiz_image');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');

        imageInput?.addEventListener('change', handleImageUpload);

        function handleImageUpload(event) {
            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.createElement('img');
                imagePreview.src = e.target.result;
                imagePreview.classList.add('image-preview');
                imagePreviewContainer.innerHTML = '';
                imagePreviewContainer.appendChild(imagePreview);
            };

            reader.readAsDataURL(file);
            } else {
            imagePreviewContainer.innerHTML = 'Please select a valid image file.';
            }
        }
    }

    function init () {
        initializeImagePreview();
    }


    return {
        init
    }
})