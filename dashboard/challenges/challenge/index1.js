const startChallengeButton = document.querySelector('button.start-challenge');

startChallengeButton.addEventListener('click', (event) => {
    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    // Push our data into our FormData object
    FD.append('challenge_id', startChallengeButton.dataset.challenge_id);

    startChallengeButton.disabled = true;

    // Define what happens on successful data submission
    XHR.addEventListener('load', function (event) {
        alert(event.target.responseText);
    });

    // Define what happens in case of error
    XHR.addEventListener(' error', function (event) {
        alert('Oops! Something went wrong.');

        startChallengeButton.disabled = false;
    });

    // Set up our request
    XHR.open('POST', '../../../php-apis/start-challenge.php');

    // Send our FormData object; HTTP headers are set automatically
    XHR.send(FD);
});