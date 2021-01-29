<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<!-- Modal -->
<div class="modal fade" id="withdrawalRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Withdrawal Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small>Enter the amount and method to withdraw your money</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light text-uppercase">Withdraw</button>
            </div>
        </div>
    </div>
</div>

<div class="hero bg-dark d-flex align-items-end px-5">
    <h1 class="text-white display-5 fw-bold">Withdrawal</h1>
</div>

<div class="container-fluid bg-dark py-2 px-5">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <h3 class="text-white fw-bold">Balance: $ 0.00</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning text-uppercase text-white fw-bold" data-bs-toggle="modal" data-bs-target="#withdrawalRequestModal">
                Request
            </button>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h3>Withdrawals: $ 0.00</h3>
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
                        <th scope="col">Status</th>
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