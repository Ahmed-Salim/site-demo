<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="hero bg-dark d-flex align-items-end px-5">
    <h1 class="text-white display-5 fw-bold">Deposits</h1>
</div>

<div class="container-fluid bg-dark py-2 px-5">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <h3 class="text-white fw-bold">Balance: $ 0.00</h3>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Deposit
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./paypal/">Paypal</a></li>
                    <li><a class="dropdown-item" href="#">Neteller</a></li>
                    <li><a class="dropdown-item" href="#">Skrill</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h3>Deposits: $ 0.00</h3>
        </div>
        <div class="col d-flex">
            <div class="dropdown shadow ms-auto">
                <button class="btn btn-light dropdown-toggle text-uppercase" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Report
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    <li><a class="dropdown-item" href="#">All</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Method</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include '../../footer.php';
?>