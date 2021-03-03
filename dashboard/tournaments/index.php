<?php include '../../header.php'; ?>

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
                                <div class="form-floating">
                                    <select class="form-select" id="tourney-game" name="tourney-game" required>
                                        <option value=""></option>
                                        <option value="fifa_21">FIFA 21</option>
                                        <option value="fortnite">Fortnite</option>
                                        <option value="clash_of_clans">Clash of Clans</option>
                                    </select>
                                    <label for="tourney-game" class="text-danger">Tourney Game</label>
                                    <div class="invalid-feedback">Required Field</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" id="tourney-console" name="tourney-console" required>
                                        <option value=""></option>
                                        <option value="ps4">PS4</option>
                                        <option value="pc">PC</option>
                                        <option value="xbox">Xbox</option>
                                        <option value="nintendo">Nintendo</option>
                                    </select>
                                    <label for="tourney-console" class="text-danger">Tourney Console</label>
                                    <div class="invalid-feedback">Required Field</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" min="2" step="2" class="form-control" id="tourney-players" name="tourney-players" placeholder="# of Players" required>
                            <div class="invalid-feedback">Even Number of Players Required. (Minimum 2)</div>
                            <label class="text-uppercase text-danger" for="tourney-players"># of Players</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" min="1" max="500" class="form-control" id="tourney-amount" name="tourney-amount" placeholder="Amount" required>
                            <div class="invalid-feedback">Required Field. Between $1 and $500</div>
                            <label class="text-uppercase text-danger" for="tourney-amount">Amount</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="tourney-start-date" name="tourney-start-date" placeholder="Start Date" required>
                                    <label for="tourney-start-date" class="text-danger">Start Date</label>
                                    <div class="invalid-feedback">Required Field. Date Should Be Greater Than Today</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="time" class="form-control" id="tourney-start-time" name="tourney-start-time" placeholder="Start Time" required>
                                    <label for="tourney-start-time" class="text-danger">Start Time</label>
                                    <div class="invalid-feedback">Required Field</div>
                                </div>
                            </div>
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

<!-- Tourney Players Modal -->
<div class="modal fade" id="tourney-players-modal" tabindex="-1" aria-labelledby="tourney-players-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tourney-players-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Player Username</th>
                            <th scope="col">Skill Level</th>
                            <th scope="col">Skill Points</th>
                            <th scope="col">Entered Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <h2 class="text-center fs-1">

                <?php

                include_once '../../php-apis/db-config.php';
                include_once '../../php-apis/clean-input.php';

                $user_id = $_SESSION['id'];

                $sql = "SELECT COUNT(*) AS open_count FROM tournaments_log WHERE tournament_by = $user_id AND status = 'open'";
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
            </h2>

            <hr />

            <?php

            $sql4 = "SELECT * FROM tournaments_log WHERE tournament_by = $user_id AND status = 'open' ORDER BY created_timestamp DESC";
            $result4 = mysqli_query($conn, $sql4);

            if (mysqli_num_rows($result4) > 0) {
                while ($row4 = mysqli_fetch_assoc($result4)) {

            ?>

                    <div class="card my-5">
                        <div class="card-header">
                            Tournament # <?php echo $row4['tournament_id']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo (($row4['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row4['game']))) : (ucwords(str_replace("_", " ", $row4['game'])))) . ' - ' . (($row4['console'] === 'ps4' || $row4['console'] === 'pc') ? (strtoupper($row4['console'])) : (ucwords($row4['console']))); ?>
                            </h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Amount</th>
                                        <td><?php echo '$' . $row4['amount']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Players</th>
                                        <td><?php echo $row4['players']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Start Date</th>
                                        <td><?php echo $row4['start_date'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Start Time</th>
                                        <td><?php echo $row4['start_time']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Game Mode</th>
                                        <td><?php echo $row4['game_mode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rules</th>
                                        <td><?php echo $row4['rules']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tourney-players-modal" data-bs-tourneyId="<?php echo $row4['tournament_id']; ?>">
                                Players
                            </button>
                        </div>
                        <div class="card-footer text-muted">
                            Created: <?php echo $row4['created_timestamp']; ?>
                        </div>
                    </div>

                <?php } ?>

            <?php } else { ?>

                <h3 class="text-center text-danger">No Open Tournaments</h3>

            <?php } ?>

        </div>
        <div class="col">
            <p class="fs-1 text-center">

                <?php

                $sql2 = "SELECT COUNT(*) AS confirmed_count FROM tournaments_log WHERE tournament_by = $user_id AND status = 'confirmed'";
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
            <p class="fs-1 text-center">

                <?php

                $sql3 = "SELECT COUNT(*) AS reported_count FROM tournaments_log WHERE tournament_by = $user_id AND status = 'reported'";
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

<?php include '../../footer.php'; ?>