const createTourneyForm = document.querySelector('#create-tourney-form');
const createTourneyFieldset = document.querySelector('#create-tourney-form > fieldset');
const tourneyStartDate = createTourneyForm.querySelector('input[type="date"]');
const createTourneyButton = document.querySelector('button[form="create-tourney-form"]');
const tourneyGameSelect = document.querySelector('#tourney-game');
var createTourneyModal = document.getElementById('createTourneyModal');

var tourneyPlayersModal = document.getElementById('tourney-players-modal');

tourneyPlayersModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var tourneyId = button.getAttribute('data-bs-tourneyId');
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //

    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    // Push our data into our FormData object
    FD.append('tourney-id', tourneyId);

    // Define what happens on successful data submission
    XHR.addEventListener('load', function (event) {
        let tourneyPlayersModalTitle = tourneyPlayersModal.querySelector('.modal-title');
        tourneyPlayersModalTitle.innerHTML = '';
        let tourneyPlayersTbody = tourneyPlayersModal.querySelector('.modal-body tbody');
        tourneyPlayersTbody.innerHTML = '';

        if (JSON.parse(event.target.responseText).status === 'success') {
            let response_msg = JSON.parse(event.target.responseText);
            let tourney_details = response_msg.tourney_details;

            let gameConsole = ((tourney_details.game === 'fifa_21') ? (tourney_details.game.replaceAll("_", " ").toUpperCase()) : (tourney_details.game.replaceAll("_", " ").toUpperCase())) + ' - ' + ((tourney_details.console === 'ps4' || tourney_details.console === 'pc') ? (tourney_details.console.toUpperCase()) : (tourney_details.console.toUpperCase()));

            tourneyPlayersModalTitle.textContent = 'Tournament # ' + tourney_details.tournament_id + ' (' + gameConsole + ')';

            tourney_details.tourney_players.forEach((tourney_player, index) => {
                let tr = document.createElement('tr');

                let td1 = document.createElement('td');
                td1.textContent = (index + 1);
                tr.appendChild(td1);

                let td2 = document.createElement('td');
                td2.textContent = tourney_player.username.toUpperCase();
                tr.appendChild(td2);

                let td3 = document.createElement('td');
                td3.textContent = tourney_player.skill_level.toUpperCase();
                tr.appendChild(td3);

                let td4 = document.createElement('td');
                td4.textContent = tourney_player.skill_points;
                tr.appendChild(td4);

                let td5 = document.createElement('td');
                td5.textContent = tourney_player.enter_timestamp;
                tr.appendChild(td5);

                tourneyPlayersTbody.appendChild(tr);
            });
        } else {
            let errorSpan = document.createElement('span');
            errorSpan.classList.add('text-danger');
            errorSpan.textContent = 'Error!';

            tourneyPlayersModalTitle.appendChild(errorSpan);

            let response_msg = JSON.parse(event.target.responseText);

            response_msg.error_msgs.forEach((error_msg) => {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.setAttribute('colSpan', 5);
                td.classList.add('text-center');
                td.classList.add('text-danger');
                td.textContent = error_msg;

                tr.appendChild(td);
                tourneyPlayersTbody.appendChild(tr);
            });
        }
    });

    // Define what happens in case of error
    XHR.addEventListener(' error', function (event) {
        alert('Oops! Something went wrong.');
    });

    // Set up our request
    XHR.open('POST', '../../php-apis/get-tourney-details.php');

    // Send our FormData object; HTTP headers are set automatically
    XHR.send(FD);
});

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