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
                                <select class="form-select" aria-label="Default select example" id="tourney-game" name="tourney-game" required>
                                    <option value="">Select Game</option>
                                    <option value="fifa">FIFA 21</option>
                                    <option value="fortnite">Fortnite</option>
                                    <option value="clash_of_clans">Clash of Clans</option>
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
                            <input type="number" min="2" class="form-control" id="tourney-players" name="tourney-players" placeholder="# of Players" required>
                            <div class="invalid-feedback">Minimum 2 Players Required</div>
                            <label class="text-uppercase" for="tourney-players"># of Players</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" min="10" step="any" class="form-control" id="tourney-amount" name="tourney-amount" placeholder="Amount" required>
                            <div class="invalid-feedback">Minimum $10 Required</div>
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
            <p class="fs-1">

                <?php

                include_once '../../php-apis/db-config.php';
                include_once '../../php-apis/clean-input.php';

                $user_id = $_SESSION['id'];

                $sql = "SELECT COUNT(*) AS open_count FROM tournaments_log WHERE tournament_by=$user_id AND status='open'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['open_count'];
                    }
                } else {
                    echo '0';
                }

                ?>

                Open
            </p>
        </div>
        <div class="col">
            <p class="fs-1">

                <?php

                include_once '../../php-apis/db-config.php';
                include_once '../../php-apis/clean-input.php';

                $user_id = $_SESSION['id'];

                $sql2 = "SELECT COUNT(*) AS confirmed_count FROM tournaments_log WHERE tournament_by=$user_id AND status='confirmed'";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo $row2['confirmed_count'];
                    }
                } else {
                    echo '0';
                }

                ?>

                Confirmed
            </p>
        </div>
        <div class="col">
            <p class="fs-1">

                <?php

                include_once '../../php-apis/db-config.php';

                $user_id = $_SESSION['id'];

                $sql3 = "SELECT COUNT(*) AS reported_count FROM tournaments_log WHERE tournament_by=$user_id AND status='reported'";
                $result3 = mysqli_query($conn, $sql3);

                if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        echo $row3['reported_count'];
                    }
                } else {
                    echo '0';
                }

                ?>

                Reported
            </p>
        </div>
    </div>
</div>

<script src="./index1.js"></script>

<?php
include '../../footer.php';
?>