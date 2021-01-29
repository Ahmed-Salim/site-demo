<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="hero d-flex align-items-end">
    <h1 class="ms-5 text-white display-5 fw-bold">My Tournaments</h1>
</div>

<div class="container-fluid bg-dark py-2">
    <div class="row">
        <div class="col d-flex mx-4">
            <a class="btn btn-dark text-uppercase" href="../find-opponent" role="button">Find Opponent</a>
            <a class="btn btn-dark text-uppercase" href="#" role="button">History</a>
            <button type="button" class="btn btn-light ms-auto text-uppercase">Create</button>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>0</h2>
            <h2>Open</h2>
        </div>
        <div class="col">
            <h2>0</h2>
            <h2>Confirm</h2>
        </div>
        <div class="col">
            <h2>0</h2>
            <h2>Report</h2>
        </div>
    </div>
</div>

<?php
include '../../footer.php';
?>