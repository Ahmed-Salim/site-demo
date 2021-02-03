const createTourneyForm = document.querySelector('#create-tourney-form');
var createTourneyModal = document.getElementById('createTourneyModal');

createTourneyModal.addEventListener('hidden.bs.modal', function (event) {
    createTourneyForm.reset();
    createTourneyForm.classList.remove('was-validated');
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    createTourneyForm.addEventListener('submit', function (event) {
        if (!createTourneyForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            event.stopPropagation();
        }

        createTourneyForm.classList.add('was-validated')
    }, false);
})()