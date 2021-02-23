const acceptChallengeButtons = document.querySelectorAll('.accept-challenge-button');

acceptChallengeButtons.forEach(function (acceptChallengeButton, currentIndex, listObj) {
    acceptChallengeButton.addEventListener('click', () => {
        const XHR = new XMLHttpRequest();
        const FD = new FormData();

        // Push our data into our FormData object
        FD.append('challenge-id', acceptChallengeButton.dataset.challengeId);

        acceptChallengeButton.disabled = true;

        // Define what happens on successful data submission
        XHR.addEventListener('load', function (event) {
            alert(JSON.parse(event.target.responseText).description);

            if (JSON.parse(event.target.responseText).status === 'success') {
                window.location.href = "../challenges";
            } else {
                acceptChallengeButton.disabled = false;
            }
        });

        // Define what happens in case of error
        XHR.addEventListener('error', function (event) {
            alert('Oops! Something went wrong.');

            acceptChallengeButton.disabled = false;
        });

        // Set up our request
        XHR.open('POST', '../../php-apis/accept-challenge.php');

        // Send our FormData object; HTTP headers are set automatically
        XHR.send(FD);
    });
});