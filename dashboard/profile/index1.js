const changePassForm = document.querySelector('#change-password-form');
const changePassFieldset = document.querySelector('#change-password-form > fieldset');
const changePassButton = document.querySelector('button[form="change-password-form"]');

document.querySelector('#passwordModal').addEventListener('hidden.bs.modal', (event) => {
    changePassForm.reset();
});

changePassForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // Bind the FormData object and the form element
    // const FD = new FormData(changePassForm);

    // changePassFieldset.disabled = true;
    // changePassButton.disabled = true;

    // const XHR = new XMLHttpRequest();

    // // Define what happens on successful data submission
    // XHR.addEventListener("load", function (event) {
    //     console.log(event.target.responseText);
    //     // let responseMsg = JSON.parse(event.target.responseText);

    //     // if (responseMsg.status.includes('success')) {
    //     //     changePassForm.reset();
    //     //     //window.location.href = "/demo-site/dashboard/";
    //     // } else {
    //     //     alert(responseMsg.description);
    //     // }

    //     changePassFieldset.disabled = false;
    //     changePassButton.disabled = false;
    // });

    // // Define what happens in case of error
    // XHR.addEventListener("error", function (event) {
    //     alert('Oops! Something went wrong.');
    //     changePassFieldset.disabled = false;
    //     changePassButton.disabled = false;
    // });

    // // Set up our request
    // XHR.open("POST", "../../php-apis/change-password.php");

    // // The data sent is what the user provided in the form
    // XHR.send(FD);
});