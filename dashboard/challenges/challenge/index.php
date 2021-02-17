<?php include '../../../header.php'; ?>

<?php

if (isset($_GET['challenge-id']) && !empty($_GET['challenge-id'])) {
    include_once '../../../php-apis/db-config.php';
    include_once '../../../php-apis/clean-input.php';

    $challenge_id = mysqli_real_escape_string($conn, clean_input($_GET["challenge-id"]));

?>

    <div class="container my-5">
        <h1 class="text-center my-5"><?php echo 'Challenge ID: ' . $challenge_id; ?></h1>

        <?php

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>

                <h2 class="text-center"><?php echo (($row['game'] === 'fifa_21') ? (strtoupper(str_replace("_", " ", $row['game']))) : (ucwords(str_replace("_", " ", $row['game'])))) . ' - ' . (($row['console'] === 'ps4' || $row['console'] === 'pc') ? (strtoupper($row['console'])) : (ucwords($row['console']))); ?></h2>

                <table class="table table-borderless text-center fs-4">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-uppercase">
                                <?php

                                $challenge_by = $row['challenge_by'];

                                $sql2 = "SELECT * FROM users WHERE id = $challenge_by";
                                $result2 = mysqli_query($conn, $sql2);

                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo $row2['username'];
                                    }
                                } else {
                                    echo "<p class='text-danger'>User Not Found!</p>";
                                }

                                ?>
                            </th>
                            <th scope="row">VS</th>
                            <th scope="row" class="text-uppercase">
                                <?php

                                $accepted_by = $row['accepted_by'];

                                $sql3 = "SELECT * FROM users WHERE id = $accepted_by";
                                $result3 = mysqli_query($conn, $sql3);

                                if (mysqli_num_rows($result3) > 0) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        echo $row3['username'];
                                    }
                                } else {
                                    echo "<p class='text-danger'>User Not Found!</p>";
                                }

                                ?>
                            </th>
                        </tr>
                        <tr>
                            <td><?php echo '$' . $row['amount']; ?></td>
                            <td></td>
                            <td><?php echo '$' . $row['amount']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'Created Time: ' . $row['created_timestamp']; ?></td>
                            <td></td>
                            <td><?php echo 'Accepted Time: ' . $row['accepted_timestamp']; ?></td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="3">Game Mode</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?php echo $row['game_mode']; ?></td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="3">Rules</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?php echo $row['rules']; ?></td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="3">Challenge Date</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?php echo $row['challenge_date']; ?></td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="3">Challenge Time</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?php echo $row['challenge_time']; ?></td>
                        </tr>

                        <?php

                        if ($_SESSION['id'] === $challenge_by || $_SESSION['id'] === $accepted_by) {
                            if (($_SESSION['id'] === $challenge_by && !empty($row['challenge_by_start_timestamp']) && !is_null($row['challenge_by_start_timestamp'])) || ($_SESSION['id'] === $accepted_by && !empty($row['accepted_by_start_timestamp']) && !is_null($row['accepted_by_start_timestamp']))) {
                                $button_disabled = 'disabled';
                            } else {
                                $button_disabled = '';
                            }
                        ?>

                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-primary btn-lg fs-1 text-uppercase start-challenge" data-challenge_id="<?php echo $challenge_id; ?>" <?php echo $button_disabled; ?>>Start</button>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3">Start Timestamps</th>
                            </tr>
                            <tr>
                                <td><?php echo $row['challenge_by_start_timestamp']; ?></td>
                                <td></td>
                                <td><?php echo $row['accepted_by_start_timestamp']; ?></td>
                            </tr>

                            <?php

                            if ((!is_null($row['challenge_by_start_timestamp']) && !empty($row['challenge_by_start_timestamp'])) && (!is_null($row['accepted_by_start_timestamp']) && !empty($row['accepted_by_start_timestamp']))) {
                                if (($_SESSION['id'] === $challenge_by && !is_null($row['challenge_by_claimed_result']) && !empty($row['challenge_by_claimed_result'])) || ($_SESSION['id'] === $accepted_by && !is_null($row['accepted_by_claimed_result']) && !empty($row['accepted_by_claimed_result']))) {
                                    $claimButtonDisable = 'disabled';
                                } else {
                                    $claimButtonDisable = '';
                                }

                            ?>

                                <tr>
                                    <td colspan="3">
                                        <button id="win-button" type="button" class="btn btn-lg btn-success text-uppercase fs-1" <?php echo $claimButtonDisable; ?>>I Won</button>
                                        <button id="lose-button" type="button" class="btn btn-lg btn-danger text-uppercase fs-1" <?php echo $claimButtonDisable; ?>>I Lost</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3">Claimed Results</th>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-uppercase">
                                        <?php echo $row['challenge_by_claimed_result']; ?>
                                        <br />
                                        <?php echo $row['challenge_by_claim_timestamp']; ?>
                                    </td>
                                    <td></td>
                                    <td class="fw-bold text-uppercase">
                                        <?php echo $row['accepted_by_claimed_result']; ?>
                                        <br />
                                        <?php echo $row['accepted_by_claim_timestamp']; ?>
                                    </td>
                                </tr>

                                <?php

                                if ($row['status'] === 'disputed' || $row['status'] === 'completed') {
                                    if ($row['status'] === 'disputed') {
                                        echo '<tr><td colspan="3" class="fs-1 fw-bold text-danger">Results Disputed</td></tr>';
                                    } else {
                                        echo '<tr><td colspan="3" class="fs-1 fw-bold text-success">Challenge Completed<br />Challenge Amount Transfered To The Winning Player</td></tr>';
                                    }
                                } else {
                                }

                                ?>

                            <?php

                            } else {
                            }

                            ?>

                    </tbody>
                </table>

            <?php } else { ?>

                </tbody>
                </table>

            <?php } ?>

<?php

            }
        } else {
            echo "<h2 class='text-center text-danger'>Invalid Challenge ID!</h2>";
        }
    } else {
        echo 'Error: Challenge ID Missing!';
    }

?>

    </div>

    <script src="./index1.js"></script>

    <?php include '../../../footer.php'; ?>