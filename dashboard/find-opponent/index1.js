const challengeDetailsModal = document.querySelector('#challenge-details-modal');
const challengeDetailsTableBody = document.querySelector('#challenge-details-modal tbody');

const acceptChallengeModal = document.querySelector('#accept-challenge-modal');
const acceptChallengeTableBody = document.querySelector('#accept-challenge-modal tbody');
const acceptChallengeForm = document.querySelector('#accept-challenge-form');
const acceptChallengeFieldset = document.querySelector('#accept-challenge-form fieldset');
const acceptChallengeButton = document.querySelector('button[form="accept-challenge-form"]');

challengeDetailsModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    let button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    let challengeDetails = JSON.parse(button.getAttribute('data-bs-challenge-details'));
    // Update the modal's content.
    challengeDetailsTableBody.innerHTML = '';

    for (property in challengeDetails) {
        if (property === 'challenge_id' || property === 'min_date') {
        } else {
            let tr = document.createElement('tr');
            let th = document.createElement('th');
            th.setAttribute('scope', 'row');
            th.textContent = property;
            let td = document.createElement('td');
            td.textContent = challengeDetails[property];
            tr.appendChild(th);
            tr.appendChild(td);
            challengeDetailsTableBody.appendChild(tr);
        }
    }
});

acceptChallengeModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    let button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    let challengeDetails = JSON.parse(button.getAttribute('data-bs-challenge-details'));
    // Update the modal's content.
    acceptChallengeTableBody.innerHTML = '';

    for (property in challengeDetails) {
        if (property === 'challenge_id' || property === 'min_date') {
        } else {
            let tr = document.createElement('tr');
            let th = document.createElement('th');
            th.setAttribute('scope', 'row');
            th.textContent = property;
            let td = document.createElement('td');
            td.textContent = challengeDetails[property];
            tr.appendChild(th);
            tr.appendChild(td);
            acceptChallengeTableBody.appendChild(tr);
        }
    }

    document.querySelector('#accept-challenge-modal .amount-warning').textContent = 'You Need To Have Atleast ' + challengeDetails['Amount'] + ' In Your Balance. ' + challengeDetails['Amount'] + ' Will Be Deducted From Your Balance';
    document.querySelector('#accept-challenge-form input[type="date"]').setAttribute('min', challengeDetails['min_date']);
    document.querySelector('#accept-challenge-form input[name="challenge-id"]').setAttribute('value', challengeDetails['challenge_id']);
});

acceptChallengeModal.addEventListener('hidden.bs.modal', function (event) {
    acceptChallengeForm.reset();
});


acceptChallengeForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const XHR = new XMLHttpRequest();

    // Bind the FormData object and the form element
    const FD = new FormData(acceptChallengeForm);

    acceptChallengeFieldset.disabled = true;
    acceptChallengeButton.disabled = true;

    // Define what happens on successful data submission
    XHR.addEventListener("load", function (event) {
        alert(event.target.responseText);

        acceptChallengeFieldset.disabled = false;
        acceptChallengeButton.disabled = false;
    });

    // Define what happens in case of error
    XHR.addEventListener("error", function (event) {
        alert('Oops! Something went wrong.');

        acceptChallengeFieldset.disabled = false;
        acceptChallengeButton.disabled = false;
    });

    // Set up our request
    XHR.open("POST", "../../php-apis/accept-challenge.php");

    // The data sent is what the user provided in the form
    XHR.send(FD);
});