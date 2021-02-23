const startChallengeButton = document.querySelector('button.start-challenge');
const winButton = document.querySelector('button#win-button');
const loseButton = document.querySelector('button#lose-button');
let url = new URL(window.location.href);
let challengeId = url.searchParams.get("challenge-id");


if (document.body.contains(document.querySelector('button#win-button'))) {
    winButton.addEventListener('click', (event) => {
        claimResult('win');
    });
}

if (document.body.contains(document.querySelector('button#lose-button'))) {
    loseButton.addEventListener('click', (event) => {
        claimResult('lose');
    });
}

if (document.body.contains(document.querySelector('button.start-challenge'))) {
    startChallengeButton.addEventListener('click', (event) => {
        const XHR = new XMLHttpRequest();
        const FD = new FormData();

        // Push our data into our FormData object
        FD.append('challenge_id', startChallengeButton.dataset.challenge_id);

        startChallengeButton.disabled = true;

        // Define what happens on successful data submission
        XHR.addEventListener('load', function (event) {
            alert(event.target.responseText);

            location.reload();
        });

        // Define what happens in case of error
        XHR.addEventListener('error', function (event) {
            alert('Oops! Something went wrong.');

            startChallengeButton.disabled = false;
        });

        // Set up our request
        XHR.open('POST', '../../../php-apis/start-challenge.php');

        // Send our FormData object; HTTP headers are set automatically
        XHR.send(FD);
    });
}

function claimResult(claim) {
    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    // Push our data into our FormData object
    FD.append('claim', claim);
    FD.append('challengeId', challengeId);

    winButton.disabled = true;
    loseButton.disabled = true;

    // Define what happens on successful data submission
    XHR.addEventListener('load', function (event) {
        alert(event.target.responseText);

        location.reload();
    });

    // Define what happens in case of error
    XHR.addEventListener('error', function (event) {
        alert('Oops! Something went wrong.');

        startChallengeButton.disabled = false;
    });

    // Set up our request
    XHR.open('POST', '../../../php-apis/claim-challenge-result.php');

    // Send our FormData object; HTTP headers are set automatically
    XHR.send(FD);
}