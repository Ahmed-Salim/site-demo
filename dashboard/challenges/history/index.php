<?php
include '../../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="hero d-flex align-items-end">
    <h1 class="ms-5 text-white display-5 fw-bold">Challenge History</h1>
</div>

<div class="container-fluid bg-dark py-2">
    <div class="row">
        <div class="col mx-4">
            <a class="btn btn-dark text-uppercase" href="../../find-opponent" role="button">Find Opponent</a>
            <a class="btn btn-dark text-uppercase" href="../" role="button">My Challenges</a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <p class="text-center fw-bold">No history available</p>
        </div>
    </div>
</div>

<?php
include '../../../footer.php';
?>