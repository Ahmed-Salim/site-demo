const acceptChallengeButtons = document.querySelectorAll('.accept-challenge-button');

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

                let th = document.createElement('th');
                th.setAttribute('scope', 'row');
                th.textContent = (index + 1);
                tr.appendChild(th);

                let td2 = document.createElement('td');
                td2.textContent = tourney_player.username.toUpperCase();
                if (tourney_details.tournament_by === tourney_player.player_id) {
                    let span = document.createElement('span');
                    span.classList.add('badge', 'bg-secondary', 'ms-2');
                    span.textContent = 'Owner';
                    td2.appendChild(span);
                } else {
                }
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

acceptChallengeButtons.forEach(function (acceptChallengeButton, currentIndex, listObj) {
    acceptChallengeButton.addEventListener('click', () => {
        if (window.confirm("Are you sure you want to Accept this Challenge ?\nAccepting this Challenge will DEDUCT the Challenge amount from your Balance.\nPress (OK) to Accept or (Cancel) to return back.")) {
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
                    location.reload();
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
        } else {
        }
    });
});