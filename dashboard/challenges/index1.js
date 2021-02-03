const createChallengeForm = document.querySelector('#create-challenge-form');
var createChallengeModal = document.getElementById('createChallengeModal');

createChallengeModal.addEventListener('hidden.bs.modal', function (event) {
    createChallengeForm.reset();
    createChallengeForm.classList.remove('was-validated');
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    createChallengeForm.addEventListener('submit', function (event) {
        if (!createChallengeForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            event.stopPropagation();
        }

        createChallengeForm.classList.add('was-validated')
    }, false);
})()