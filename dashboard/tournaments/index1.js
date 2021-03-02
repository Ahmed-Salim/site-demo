const createTourneyForm = document.querySelector('#create-tourney-form');
const createTourneyFieldset = document.querySelector('#create-tourney-form > fieldset');
const tourneyStartDate = createTourneyForm.querySelector('input[type="date"]');
const createTourneyButton = document.querySelector('button[form="create-tourney-form"]');
const tourneyGameSelect = document.querySelector('#tourney-game');
var createTourneyModal = document.getElementById('createTourneyModal');

createTourneyModal.addEventListener('shown.bs.modal', function (event) {
    let today = new Date();
    tourneyStartDate.setAttribute('min', new Date(today.setDate(today.getDate() + 1)).toISOString().slice(0, 10));
    tourneyGameSelect.focus();
});

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

            //Bind the FormData object and the form element
            const FD = new FormData(createTourneyForm);

            createTourneyFieldset.disabled = true;
            createTourneyButton.disabled = true;

            const XHR = new XMLHttpRequest();

            // Define what happens on successful data submission
            XHR.addEventListener("load", function (event) {
                let responseMsg = JSON.parse(event.target.responseText);
                alert(responseMsg.description);

                if (responseMsg.status.includes('success')) {
                    location.reload();
                } else {
                    createTourneyFieldset.disabled = false;
                    createTourneyButton.disabled = false;

                    createTourneyForm.classList.remove('was-validated');

                    tourneyGameSelect.focus();
                }
            });

            // Define what happens in case of error
            XHR.addEventListener("error", function (event) {
                alert('Oops! Something went wrong.');
                createTourneyFieldset.disabled = false;
                createTourneyButton.disabled = false;

                tourneyGameSelect.focus();
            });

            // Set up our request
            XHR.open("POST", "../../php-apis/create-tournament.php");

            // The data sent is what the user provided in the form
            XHR.send(FD);
        }

        createTourneyForm.classList.add('was-validated')
    }, false);
})()