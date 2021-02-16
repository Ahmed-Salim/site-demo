<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();
$response_msg['status'] = '';
$response_msg['description'] = '';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (empty($_POST["challenge_id"])) {
        $response_msg['status'] .= 'error';
        $response_msg['description'] .= 'Error: Challenge ID Missing!';
    } else {
        $start_by_id = $_SESSION['id'];
        $challenge_id = mysqli_real_escape_string($conn, clean_input($_POST["challenge_id"]));

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($start_by_id === $row['challenge_by'] || $start_by_id === $row['accepted_by']) {
                    if ($row['status'] === 'accepted') {
                        $sql2 = "SELECT NOW() AS now_timestamp";
                        $result2 = mysqli_query($conn, $sql2);

                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                if (($row['challenge_date'] . ' ' . $row['challenge_time']) >= $row2['now_timestamp']) {
                                    if ($start_by_id === $row['challenge_by']) {
                                        $sql5 = "UPDATE challenges_log SET challenge_by_start_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    } else {
                                        $sql5 = "UPDATE challenges_log SET accepted_by_start_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    }

                                    if (mysqli_query($conn, $sql5)) {
                                        $response_msg['status'] .= 'success';
                                        $response_msg['description'] .= 'Challenge Started Successfully!';
                                    } else {
                                        $response_msg['status'] .= 'error';
                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                    }
                                } else {
                                    $response_msg['status'] .= 'error';
                                    $response_msg['description'] .= 'Error: Challenge Time Is Over!';

                                    $sql3 = "UPDATE challenges_log SET status = 'no_result' WHERE challenge_id = $challenge_id";

                                    if (mysqli_query($conn, $sql3)) {
                                        $response_msg['description'] .= 'Challenge Status Updated To No Result!';
                                    } else {
                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                    }

                                    $challenge_by = $row['challenge_by'];
                                    $accepted_by = $row['accepted_by'];
                                    $amount = $row['amount'];

                                    $sql4 = "UPDATE users SET balance = (balance + $amount) WHERE id = $challenge_by OR id = $accepted_by";

                                    if (mysqli_query($conn, $sql4)) {
                                        $response_msg['description'] .= 'Challenge Amount Refunded To Both Players!';
                                    } else {
                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                    }
                                }
                            }
                        } else {
                            $response_msg['status'] .= 'error';
                            $response_msg['description'] .= 'Error: Unknown Query Error!';
                        }
                    } else {
                        $response_msg['status'] .= 'error';
                        $response_msg['description'] .= 'Error: Challenge Not In Accepted State!';
                    }
                } else {
                    $response_msg['status'] .= 'error';
                    $response_msg['description'] .= 'Error: You Are Not A Part Of This Challenge!';
                }
            }
        } else {
            $response_msg['status'] .= 'error';
            $response_msg['description'] .= 'Error: Invalid Challenge ID!';
        }
    }
} else {
    $response_msg['status'] .= 'error';
    $response_msg['description'] .= 'Session ID missing! Please login again to continue!';
}

mysqli_close($conn);

echo json_encode($response_msg);
