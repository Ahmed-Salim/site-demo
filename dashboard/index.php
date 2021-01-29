<?php
include '../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="hero bg-dark d-flex align-items-end px-5">
    <h1 class="text-white display-5 fw-bold">Dashboard</h1>
</div>

<div class="container-fluid bg-dark py-2 px-5">
    <div class="row">
        <div class="col">
            <h3 class="text-white fw-bold">Balance: $ 0.00</h3>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h3 class="mb-5"><i class="bi bi-star-fill me-3"></i>Star Playing</h3>
            <a class="btn btn-outline-secondary border-0" href="./find-opponent" role="button">FIND OPPONENT</a>
            <a class="btn btn-outline-secondary border-0" href="./challenges/" role="button">CHALLENGES</a>
            <a class="btn btn-outline-secondary border-0" href="./tournaments/" role="button">TOURNAMENTS</a>
            <hr />
            <a class="btn btn-outline-secondary border-0" href="../help" role="button">HELP</a>
            <a class="btn btn-outline-secondary border-0" href="../ranking" role="button">RANKING</a>
            <a class="btn btn-outline-secondary border-0" href="#" role="button">DISPUTES</a>
        </div>
        <div class="col">
            <h3 class="mb-5"><i class="bi bi-wallet-fill me-3"></i>Fund Your Account</h3>
            <a class="btn btn-outline-secondary border-0" href="#" role="button">MAKE DEPOSIT</a>
            <a class="btn btn-outline-secondary border-0" href="#" role="button">WITHDRAWAL</a>
        </div>
    </div>
</div>

<?php
include '../footer.php';
?>