<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<!-- Modal -->
<div class="modal fade" id="createTourneyModal" tabindex="-1" aria-labelledby="createTourneyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTourneyModalLabel">Create Tournament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-tourney-form" novalidate>
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" name="tourney-game" required>
                                    <option value="">Select Game</option>
                                    <option value="fifa">FIFA 21</option>
                                    <option value="fortnite">FortNite</option>
                                    <option value="clashofclawns">Clash of Clawns</option>
                                </select>
                                <div class="invalid-feedback">Required Field</div>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" name="tourney-console" required>
                                    <option value="">Select Console</option>
                                    <option value="ps4">PS4</option>
                                    <option value="pc">PC</option>
                                    <option value="xbox">Xbox</option>
                                    <option value="nintendo">Nintendo</option>
                                </select>
                                <div class="invalid-feedback">Required Field</div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="tourney-players" name="tourney-players" placeholder="# Players" required>
                            <div class="invalid-feedback">Required Field</div>
                            <label class="text-uppercase" for="tourney-players"># Players</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="tourney-amount" name="tourney-amount" placeholder="Amount" required>
                            <div class="invalid-feedback">Required Field</div>
                            <label class="text-uppercase" for="tourney-amount">Amount</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tourney-game-mode" name="tourney-game-mode" placeholder="SPECIFY GAME MODE (OPTIONAL)">
                            <label class="text-uppercase" for="tourney-game-mode">SPECIFY GAME MODE (OPTIONAL)</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Rules" id="tourney-rules" name="tourney-rules"></textarea>
                            <label class="text-uppercase" for="tourney-rules">Rules</label>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="create-tourney-form" class="btn btn-light text-uppercase">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="hero d-flex align-items-end">
    <h1 class="ms-5 text-white display-5 fw-bold">My Tournaments</h1>
</div>

<div class="container-fluid bg-dark py-2">
    <div class="row">
        <div class="col d-flex mx-4">
            <a class="btn btn-dark text-uppercase" href="../find-opponent" role="button">Find Opponent</a>
            <a class="btn btn-dark text-uppercase" href="./history/" role="button">History</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light text-uppercase ms-auto" data-bs-toggle="modal" data-bs-target="#createTourneyModal">Create</button>
        </div>
    </div>
</div>

<div class="container my-5">
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

<script src="./index1.js"></script>

<?php
include '../../footer.php';
?>