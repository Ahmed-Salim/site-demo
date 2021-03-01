<?php include '../../../header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col">

            <?php if (empty($_GET['challenge-id']) || is_null($_GET['challenge-id'])) { ?>

                <h1 class="text-center">Challenge ID Missing</h1>
                <p class="text-center">
                    <a href="../" class="btn btn-primary">Go Back To Challenges...</a>
                </p>

            <?php } else { ?>

                <?php

                include_once '../../../php-apis/db-config.php';
                include_once '../../../php-apis/clean-input.php';

                $logged_in_player_id = $_SESSION['id'];
                $challenge_id = mysqli_real_escape_string($conn, clean_input($_GET["challenge-id"]));

                $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['status'] === 'confirmed') {

                ?>

                            <h1 class="text-center">Challenge # <?php echo $row['challenge_id']; ?></h1>

                            <h2 class="text-center my-5">
                                <?php echo (($row['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row['game']))) : (ucwords(str_replace("_", " ", $row['game'])))) . ' - ' . (($row['console'] === 'ps4' || $row['console'] === 'pc') ? (strtoupper($row['console'])) : (ucwords($row['console']))); ?>
                            </h2>

                            <table class="table table-borderless fs-4">
                                <tbody>
                                    <tr>
                                        <td class="text-uppercase text-start fw-bold">

                                            <?php

                                            $challenge_by = $row['challenge_by'];

                                            $sql2 = "SELECT * FROM users WHERE id = $challenge_by";
                                            $result2 = mysqli_query($conn, $sql2);

                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo $row2['username'];
                                                }
                                            } else {
                                                echo 'User Not Found!';
                                            }

                                            ?>

                                        </td>
                                        <td class="text-center fw-bold">VS</td>
                                        <td class="text-uppercase text-end fw-bold">

                                            <?php

                                            $accepted_by = $row['accepted_by'];

                                            $sql3 = "SELECT * FROM users WHERE id = $accepted_by";
                                            $result3 = mysqli_query($conn, $sql3);

                                            if (mysqli_num_rows($result3) > 0) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    echo $row3['username'];
                                                }
                                            } else {
                                                echo 'User Not Found!';
                                            }

                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="3">Challenge Amount</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start"><?php echo '$' . $row['amount']; ?></td>
                                        <td class="text-center"><?php echo '($' . ($row['amount'] * 2) . ')'; ?></td>
                                        <td class="text-end"><?php echo '$' . $row['amount']; ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-center">Challenge Date Time</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="3"><?php echo $row['challenge_date'] . ' ' . $row['challenge_time'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="3">Game Mode</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="3">

                                            <?php

                                            if (empty($row['game_mode']) || is_null($row['game_mode'])) {
                                                echo 'None';
                                            } else {
                                                echo $row['game_mode'];
                                            }

                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="3">Rules</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="3">

                                            <?php

                                            if (empty($row['rules']) || is_null($row['rules'])) {
                                                echo 'None';
                                            } else {
                                                echo $row['rules'];
                                            }

                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="3">Timestamps</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="3">

                                            <?php

                                            echo 'Created: ' . $row['created_timestamp'] . '<br />';
                                            echo (empty($row['reset_timestamp']) || is_null($row['reset_timestamp'])) ? ('') : ('Reset: ' . $row['reset_timestamp'] . '<br />');
                                            echo (empty($row['reopen_timestamp']) || is_null($row['reopen_timestamp'])) ? ('') : ('Re-Open: ' . $row['reopen_timestamp'] . '<br />');
                                            echo 'Accepted: ' . $row['accepted_timestamp'] . '<br />';
                                            echo 'Confirmed: ' . $row['confirmed_timestamp'] . '<br />';

                                            ?>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <hr />

                            <?php if ($logged_in_player_id === $row['challenge_by'] || $logged_in_player_id === $row['accepted_by']) { ?>

                                <table class="table table-borderless fs-4">
                                    <tbody>

                                        <?php

                                        $sql4 = "SELECT NOW() AS now_timestamp";
                                        $result4 = mysqli_query($conn, $sql4);

                                        if (mysqli_num_rows($result4) > 0) {
                                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                                $now_timestamp = $row4['now_timestamp'];
                                            }
                                        } else {
                                            $now_timestamp = '0000-00-00 00:00:00';
                                        }

                                        ?>

                                        <?php if (($row['challenge_date'] . ' ' . $row['challenge_time']) > $now_timestamp) { ?>

                                            <tr>
                                                <td class="text-center" colspan="3">Once the Challenge Starts Both Players Will Have One (1) Hour From The Set Challenge Date Time To Report Their Results</td>
                                            </tr>

                                        <?php } else { ?>

                                            <?php

                                            if ($logged_in_player_id === $row['challenge_by']) {
                                                if ((empty($row['challenge_by_claimed_result']) || is_null($row['challenge_by_claimed_result'])) && (empty($row['challenge_by_claim_timestamp']) || is_null($row['challenge_by_claim_timestamp']))) {
                                                    $result_claimed = false;
                                                } else {
                                                    $result_claimed = true;
                                                }
                                            } else {
                                                if ((empty($row['accepted_by_claimed_result']) || is_null($row['accepted_by_claimed_result'])) && (empty($row['accepted_by_claim_timestamp']) || is_null($row['accepted_by_claim_timestamp']))) {
                                                    $result_claimed = false;
                                                } else {
                                                    $result_claimed = true;
                                                }
                                            }

                                            ?>

                                            <?php if ($result_claimed) { ?>

                                                <tr>
                                                    <td class="text-center fs-1 fw-bold" colspan="3">Claimed Results</td>
                                                </tr>
                                                <tr class="text-start">
                                                    <td>
                                                        <span class="text-uppercase fw-bold text-start"><?php echo $row['challenge_by_claimed_result']; ?></span>
                                                        <br />
                                                        <?php echo $row['challenge_by_claim_timestamp']; ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-end">
                                                        <span class="text-uppercase fw-bold text-end"><?php echo $row['accepted_by_claimed_result']; ?></span>
                                                        <br />
                                                        <?php echo $row['accepted_by_claim_timestamp']; ?>
                                                    </td>
                                                </tr>

                                            <?php } else { ?>

                                                <tr>
                                                    <td class="text-center fs-1 fw-bold" colspan="3">The Challenge Has Begun!</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-capitalize text-center" colspan="3">You have within one (1) hour from the set challenge date and time to declare your result. Failing to do so will result in a loss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="3">
                                                        <button type="button" class="challenge-result fs-1 text-uppercase btn btn-lg btn-success" data-result="win" data-challenge-id="<?php echo $row['challenge_id']; ?>">I Won</button>
                                                        <button type="button" class="challenge-result fs-1 text-uppercase btn btn-lg btn-danger" data-result="loss" data-challenge-id="<?php echo $row['challenge_id']; ?>">I Lost</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="3">
                                                        <button type="button" class="challenge-result fs-1 text-uppercase btn btn-lg btn-secondary" data-result="tie" data-challenge-id="<?php echo $row['challenge_id']; ?>">We Tied</button>
                                                        <button type="button" class="challenge-result fs-1 text-uppercase btn btn-lg btn-dark" data-result="no-play" data-challenge-id="<?php echo $row['challenge_id']; ?>">We Didn’t Play</button>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        <?php } ?>

                                    </tbody>
                                </table>

                            <?php } else { ?>

                                <p class="text-center fs-4">You Are Not A Part Of This Challenge</p>

                            <?php } ?>

                        <?php } else { ?>

                            <h1 class="text-center">Challenge # <?php echo $row['challenge_id']; ?> Not In Confirmed State</h1>
                            <p class="text-center">
                                <a href="../" class="btn btn-primary">Go Back To Challenges...</a>
                            </p>

                        <?php } ?>

                    <?php } ?>

                <?php } else { ?>

                    <h1 class="text-center">Invalid Challenge ID</h1>
                    <p class="text-center">
                        <a href="../" class="btn btn-primary">Go Back To Challenges...</a>
                    </p>

                <?php } ?>

            <?php } ?>

        </div>
    </div>
</div>

<script src="./index1.js"></script>

<?php include '../../../footer.php'; ?>