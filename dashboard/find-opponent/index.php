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
                    <option value="fifa_21">FIFA 21</option>
                    <option value="fortnite">Fortnite</option>
                    <option value="clash_of_clans">Clash of Clans</option>
                </select>

                <select class="form-select mx-3" aria-label=".form-select-lg example">
                    <option selected>All</option>
                    <option value="ps4">PS4</option>
                    <option value="pc">PC</option>
                    <option value="xbox">Xbox</option>
                    <option value="nintendo">Nintendo</option>
                </select>

                <ul class="nav nav-pills nav-justified flex-nowrap mx-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active text-uppercase text-nowrap" id="pills-challenges-tab" data-bs-toggle="pill" href="#pills-challenges" role="tab" aria-controls="pills-challenges" aria-selected="true">

                            <?php

                            include_once '../../php-apis/db-config.php';
                            include_once '../../php-apis/clean-input.php';

                            $user_id = $_SESSION['id'];

                            $sql = "SELECT COUNT(*) AS total_challenges FROM challenges_log WHERE challenge_by <> $user_id AND status = 'open'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['total_challenges'];
                                }
                            } else {
                                echo "0";
                            }

                            ?>

                            Challenges
                        </a>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link text-uppercase text-nowrap" id="pills-tournaments-tab" data-bs-toggle="pill" href="#pills-tournaments" role="tab" aria-controls="pills-tournaments" aria-selected="false">
                            <?php

                            include_once '../../php-apis/db-config.php';
                            include_once '../../php-apis/clean-input.php';

                            $user_id = $_SESSION['id'];

                            $sql = "SELECT COUNT(*) AS total_tournaments FROM tournaments_log WHERE tournament_by <> $user_id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['total_tournaments'];
                                }
                            } else {
                                echo "0";
                            }

                            ?>
                            Tournaments
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-uppercase text-nowrap" id="pills-players-tab" data-bs-toggle="pill" href="#pills-players" role="tab" aria-controls="pills-players" aria-selected="false">Players</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="row position-absolute bottom-0">
        <div class="col">
            <h1 class="text-white display-5 fw-bold">Find Opponent</h1>
        </div>
    </div>
</div>

<div class="container-fluid my-5 px-5">
    <div class="row">
        <div class="col">

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-challenges" role="tabpanel" aria-labelledby="pills-challenges-tab">
                    <a class="btn btn-light shadow-sm text-uppercase mb-3" href="../challenges" role="button">My Challenges</a>

                    <?php

                    $sql = "SELECT * FROM users INNER JOIN challenges_log ON users.id = challenges_log.challenge_by WHERE challenges_log.challenge_by <> $user_id AND status = 'open' ORDER BY challenges_log.created_timestamp DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $skill_points = $row['skill_points'];

                            $sql1 = "SELECT * FROM skill_levels WHERE $skill_points BETWEEN min_points AND max_points";
                            $result1 = mysqli_query($conn, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $skill_level = $row1['level_name'];
                                }
                            } else {
                                $skill_level = 'undefined';
                            }

                    ?>

                            <div class="card mb-3">
                                <h4 class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <?php echo (($row['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row['game']))) : (ucwords(str_replace("_", " ", $row['game'])))) . ' - ' . (($row['console'] === 'ps4' || $row['console'] === 'pc') ? (strtoupper($row['console'])) : (ucwords($row['console']))); ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php echo '$' . $row['amount']; ?>
                                        </div>
                                    </div>
                                </h4>
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Challenge By</th>
                                                <td><?php echo ucwords($row['username']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Skill Level</th>
                                                <td><?php echo ucwords($skill_level); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Skill Points</th>
                                                <td><?php echo $skill_points; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Challenge Date</th>
                                                <td><?php echo $row['challenge_date']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Challenge Time</th>
                                                <td><?php echo $row['challenge_time']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Game Mode</th>
                                                <td><?php echo $row['game_mode']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rules</th>
                                                <td><?php echo $row['rules']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="accept-challenge-button btn btn-primary" data-challenge-id="<?php echo $row['challenge_id']; ?>">Accept</button>
                                </div>

                                <div class="card-footer text-muted"><?php echo 'Created: ' . $row['created_timestamp']; ?></div>
                            </div>

                    <?php

                        }
                    } else {
                        echo "<p class='fs-4 text-danger'>No Challenges Available!</p>";
                    }

                    ?>


                </div>

                <div class="tab-pane fade" id="pills-tournaments" role="tabpanel" aria-labelledby="pills-tournaments-tab">
                    <a class="btn btn-light shadow-sm text-uppercase mb-3" href="../tournaments" role="button">My Tournaments</a>

                    <?php

                    $sql = "SELECT * FROM users INNER JOIN tournaments_log ON users.id = tournaments_log.tournament_by WHERE tournaments_log.tournament_by <> $user_id ORDER BY tournaments_log.created_timestamp DESC";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <div class="card mb-3">
                                <h4 class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <?php echo (($row['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row['game']))) : (ucwords(str_replace("_", " ", $row['game'])))) . ' - ' . (($row['console'] === 'ps4' || $row['console'] === 'pc') ? (strtoupper($row['console'])) : (ucwords($row['console']))); ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php echo '$' . $row['amount']; ?>
                                            <button type="button" class="btn btn-primary text-uppercase ms-2">Enter</button>
                                        </div>
                                    </div>
                                </h4>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <h5 class="card-title">
                                        <i class="bi bi-file-person-fill"></i>
                                        <?php echo ucwords($row['username']); ?>
                                    </h5>
                                    <button type="button" class="btn btn-primary text-uppercase">Players</button>
                                </div>
                                <div class="card-footer text-muted"><?php echo 'Created: ' . $row['created_timestamp']; ?></div>
                            </div>

                    <?php

                        }
                    } else {
                        echo "<p class='fs-4 text-danger'>No Tournaments Available!</p>";
                    }

                    ?>

                </div>

                <div class="tab-pane fade" id="pills-players" role="tabpanel" aria-labelledby="pills-players-tab">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col">
            <h3>Shoutbox</h3>
            <form class="row">
                <div class="col-9">
                    <input class="form-control form-control-lg" type="text" placeholder="Type Here">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-lg btn-outline-secondary border-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./index1.js"></script>

<?php
include '../../footer.php';
?>