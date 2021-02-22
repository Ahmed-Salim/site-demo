const createChallengeForm = document.querySelector('#create-challenge-form');
const createChallengeFieldset = document.querySelector('#create-challenge-form > fieldset');
const createChallengeButton = document.querySelector('button[form="create-challenge-form"]');
const createChallengeModal = document.getElementById('createChallengeModal');
const challengeGameSelect = document.querySelector('#challenge-game');
const challengeDate = document.querySelector('#challenge-date');

createChallengeModal.addEventListener('shown.bs.modal', function (event) {
    let today = new Date();
    challengeDate.setAttribute('min', new Date(today.setDate(today.getDate() + 1)).toISOString().slice(0, 10));
    challengeGameSelect.focus();
});

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

            //Bind the FormData object and the form element
            const FD = new FormData(createChallengeForm);

            createChallengeFieldset.disabled = true;
            createChallengeButton.disabled = true;

            const XHR = new XMLHttpRequest();

            // Define what happens on successful data submission
            XHR.addEventListener("load", function (event) {
                let responseMsg = JSON.parse(event.target.responseText);
                alert(responseMsg.description);

                if (responseMsg.status.includes('success')) {
                    location.reload();
                } else {
                    createChallengeFieldset.disabled = false;
                    createChallengeButton.disabled = false;

                    createChallengeForm.classList.remove('was-validated');

                    challengeGameSelect.focus();
                }
            });

            // Define what happens in case of error
            XHR.addEventListener("error", function (event) {
                alert('Oops! Something went wrong.');
                createChallengeFieldset.disabled = false;
                createChallengeButton.disabled = false;

                challengeGameSelect.focus();
            });

            // Set up our request
            XHR.open("POST", "../../php-apis/create-challenge.php");

            // The data sent is what the user provided in the form
            XHR.send(FD);
        }

        createChallengeForm.classList.add('was-validated');
    }, false);
})()