<?php include '../../header.php'; ?>

<link rel="stylesheet" href="./index.css">

<!-- Modal -->
<div class="modal fade" id="createChallengeModal" tabindex="-1" aria-labelledby="createChallengeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createChallengeModalLabel">Create Challenge</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-challenge-form" novalidate>
                    <fieldset>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" id="challenge-game" name="challenge-game" required>
                                    <option value="">Select Game</option>
                                    <option value="fifa_21">FIFA 21</option>
                                    <option value="fortnite">Fortnite</option>
                                    <option value="clash_of_clans">Clash of Clans</option>
                                </select>
                                <div class="invalid-feedback">Required Field</div>
                            </div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" name="challenge-console" required>
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
                            <input type="number" min="10" step="any" class="form-control" id="challenge-amount" name="challenge-amount" placeholder="Amount" required>
                            <div class="invalid-feedback">Minimum $10 Required</div>
                            <label class="text-uppercase" for="challenge-amount">Amount</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="challenge-game-mode" name="challenge-game-mode" placeholder="SPECIFY GAME MODE (OPTIONAL)">
                            <label class="text-uppercase" for="challenge-game-mode">SPECIFY GAME MODE (OPTIONAL)</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Rules" id="challenge-rules" name="challenge-rules"></textarea>
                            <label class="text-uppercase" for="challenge-rules">Rules</label>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="create-challenge-form" class="btn btn-light text-uppercase">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="hero d-flex align-items-end">
    <h1 class="ms-5 text-white display-5 fw-bold">My Challenges</h1>
</div>

<div class="container-fluid bg-dark py-2">
    <div class="row">
        <div class="col d-flex mx-4">
            <a class="btn btn-dark text-uppercase" href="../find-opponent" role="button">Find Opponent</a>
            <a class="btn btn-dark text-uppercase" href="./history/" role="button">History</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light text-uppercase ms-auto" data-bs-toggle="modal" data-bs-target="#createChallengeModal">Create</button>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center">

                <?php

                include_once '../../php-apis/db-config.php';
                include_once '../../php-apis/clean-input.php';

                $user_id = $_SESSION['id'];

                $sql = "SELECT COUNT(*) AS open_count FROM challenges_log WHERE challenge_by = $user_id AND status = 'open'";
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
            </h1>

            <?php

            $sql4 = "SELECT * FROM challenges_log WHERE challenge_by = $user_id AND status = 'open'";
            $result4 = mysqli_query($conn, $sql4);

            if (mysqli_num_rows($result4) > 0) {
                while ($row4 = mysqli_fetch_assoc($result4)) {

            ?>

                    <div class="card my-3">
                        <div class="card-header">
                            Challenge ID: <?php echo $row4['challenge_id']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo (($row4['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row4['game']))) : (ucwords(str_replace("_", " ", $row4['game'])))) . ' - ' . (($row4['console'] === 'ps4' || $row4['console'] === 'pc') ? (strtoupper($row4['console'])) : (ucwords($row4['console']))); ?>
                            </h5>
                            <p class="card-text">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Amount</th>
                                        <td><?php echo '$' . $row4['amount']; ?></td>
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
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            Date Created: <?php echo $row4['created_timestamp']; ?>
                        </div>
                    </div>

            <?php

                }
            } else {
                echo "<h2 class='text-center my-3'>No Open Challenges!</h2>";
            }

            ?>

        </div>

        <div class="col">
            <h1 class="text-center">

                <?php

                include_once '../../php-apis/db-config.php';
                include_once '../../php-apis/clean-input.php';

                $user_id = $_SESSION['id'];

                $sql2 = "SELECT COUNT(*) AS accepted_count FROM challenges_log WHERE (challenge_by = $user_id OR accepted_by = $user_id) AND status = 'accepted'";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo $row2['accepted_count'];
                    }
                } else {
                    echo '0';
                }

                ?>

                Accepted
            </h1>

            <?php

            $sql5 = "SELECT * FROM challenges_log WHERE (challenge_by = $user_id OR accepted_by = $user_id) AND status = 'accepted'";
            $result5 = mysqli_query($conn, $sql5);

            if (mysqli_num_rows($result5) > 0) {
                while ($row5 = mysqli_fetch_assoc($result5)) {

            ?>

                    <div class="card my-3">
                        <div class="card-header">
                            Challenge ID: <?php echo $row5['challenge_id']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo (($row5['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row5['game']))) : (ucwords(str_replace("_", " ", $row5['game'])))) . ' - ' . (($row5['console'] === 'ps4' || $row5['console'] === 'pc') ? (strtoupper($row5['console'])) : (ucwords($row5['console']))); ?>
                            </h5>
                            <p class="card-text">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Created By</th>
                                        <td>
                                            <?php

                                            $challenge_by = $row5['challenge_by'];

                                            $sql6 = "SELECT * FROM users WHERE id = $challenge_by";
                                            $result6 = mysqli_query($conn, $sql6);

                                            if (mysqli_num_rows($result6) > 0) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    echo $row6['username'];
                                                }
                                            } else {
                                                echo "<p class='text-danger'>User Not Found!</p>";
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Accepted By</th>
                                        <td>
                                            <?php

                                            $accepted_by = $row5['accepted_by'];

                                            $sql7 = "SELECT * FROM users WHERE id = $accepted_by";
                                            $result7 = mysqli_query($conn, $sql7);

                                            if (mysqli_num_rows($result7) > 0) {
                                                while ($row7 = mysqli_fetch_assoc($result7)) {
                                                    echo $row7['username'];
                                                }
                                            } else {
                                                echo "<p class='text-danger'>User Not Found!</p>";
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Amount</th>
                                        <td><?php echo '$' . $row5['amount']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Game Mode</th>
                                        <td><?php echo $row5['game_mode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rules</th>
                                        <td><?php echo $row5['rules']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Challenge Date</th>
                                        <td><?php echo $row5['challenge_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Challenge Time</th>
                                        <td><?php echo $row5['challenge_time']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                            <a href="./challenge/?challenge-id=<?php echo $row5['challenge_id']; ?>" class="btn btn-primary stretched-link">Details</a>
                        </div>
                        <div class="card-footer text-muted">
                            Date Created: <?php echo $row5['created_timestamp']; ?>
                            <br />
                            Date Accepted: <?php echo $row5['accepted_timestamp']; ?>
                        </div>
                    </div>

            <?php

                }
            } else {
                echo "<h2 class='text-center my-3'>No Accepted Challenges!</h2>";
            }

            ?>

        </div>

        <div class="col">
            <h1 class="text-center">

                <?php

                include_once '../../php-apis/db-config.php';

                $user_id = $_SESSION['id'];

                $sql3 = "SELECT COUNT(*) AS disputed_count FROM challenges_log WHERE challenge_by = $user_id AND status = 'disputed'";
                $result3 = mysqli_query($conn, $sql3);

                if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        echo $row3['disputed_count'];
                    }
                } else {
                    echo '0';
                }

                ?>

                Disputed
            </h1>
        </div>
    </div>
</div>

<script src="./index1.js"></script>

<?php include '../../footer.php'; ?>