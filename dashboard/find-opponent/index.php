<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="hero container-fluid bg-dark position-relative">
    <div class="row">
        <div class="col">
            <div class="d-flex bg-white shadow py-3 mt-3">
                <select class="form-select mx-3" aria-label=".form-select-lg example">
                    <option selected>All</option>
                    <option value="1">FIFA 21</option>
                    <option value="2">FortNite</option>
                    <option value="3">Clash of Clawns</option>
                </select>

                <select class="form-select mx-3" aria-label=".form-select-lg example">
                    <option selected>All</option>
                    <option value="1">PS4</option>
                    <option value="2">PC</option>
                    <option value="3">Xbox</option>
                    <option value="4">Nintendo</option>
                </select>

                <button type="button" class="btn btn-outline-secondary border-0 mx-3 text-nowrap">0 CHALLENGES</button>
                <button type="button" class="btn btn-outline-secondary border-0 mx-3 text-nowrap">0 TOURNAMENTS</button>
                <button type="button" class="btn btn-outline-secondary border-0 mx-3 text-nowrap">0 PLAYERS</button>
            </div>
        </div>
    </div>

    <div class="row position-absolute bottom-0">
        <div class="col">
            <h1 class="text-white display-5 fw-bold">Find Opponent</h1>
        </div>
    </div>
</div>

<div class="challenge-box container mt-5">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-secondary border-0">MY CHALLENGES</button>
        </div>
        <div class="col">
            <h3>Shoutbox</h3>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-6 ms-auto">
            <form class="d-flex">
                <input class="form-control form-control-lg" type="text" placeholder="Type Here">
                <button type="button" class="btn btn-lg btn-outline-secondary border-0 ms-3">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../../footer.php';
?>