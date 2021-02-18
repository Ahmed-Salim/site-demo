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
                    if (($start_by_id === $row['challenge_by'] && !is_null($row['challenge_by_start_timestamp']) && !empty($row['challenge_by_start_timestamp'])) || ($start_by_id === $row['accepted_by'] && !is_null($row['accepted_by_start_timestamp']) && !empty($row['accepted_by_start_timestamp']))) {
                        $response_msg['status'] .= 'error';
                        $response_msg['description'] .= 'Error: You Have Already Started This Challenge!';
                    } else {
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

                                            $notif_for = ($start_by_id === $row['challenge_by']) ? ($row['accepted_by']) : ($row['challenge_by']);

                                            $sql6 = "SELECT * FROM users WHERE id = $notif_for";
                                            $result6 = mysqli_query($conn, $sql6);

                                            if (mysqli_num_rows($result6) > 0) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    $notif_msg = strtoupper($row6['username']) . ' have started the Challenge! Challenge ID: ' . $challenge_id . '.';

                                                    $sql7 = "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for, '$notif_msg')";

                                                    if (mysqli_query($conn, $sql7)) {
                                                        //echo "New record created successfully";
                                                    } else {
                                                        //echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
                                                    }
                                                }
                                            } else {
                                                //echo "0 results";
                                            }
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

                                            $notif_for_1 = $row['challenge_by'];
                                            $notif_for_2 = $row['accepted_by'];
                                            $notif_msg = 'Both players failed to start the Challenge in time! Challenge ID: ' . $challenge_id . ' has ended with No Result!';

                                            $sql8 = "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_1, '$notif_msg');";
                                            $sql8 .= "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_2, '$notif_msg');";

                                            if (mysqli_multi_query($conn, $sql8)) {
                                                //echo "New records created successfully";
                                            } else {
                                                //echo "Error: " . $sql8 . "<br>" . mysqli_error($conn);
                                            }

                                            while (mysqli_more_results($conn)) {
                                                mysqli_next_result($conn);
                                            }
                                        } else {
                                            $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                        }

                                        $challenge_by = $row['challenge_by'];
                                        $accepted_by = $row['accepted_by'];
                                        $amount = $row['amount'];

                                        $sql4 = "UPDATE users SET balance = (balance + $amount) WHERE id = $challenge_by OR id = $accepted_by";

                                        if (mysqli_query($conn, $sql4)) {
                                            $response_msg['description'] .= 'Challenge Amount Refunded To Both Players!';

                                            $notif_for_1 = $row['challenge_by'];
                                            $notif_for_2 = $row['accepted_by'];
                                            $notif_msg = 'Since Challenge ID: ' . $challenge_id . ' ended with No Result, the Challenge amount, $' . $amount . ', has been refunded to both players';

                                            $sql9 = "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_1, '$notif_msg');";
                                            $sql9 .= "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_2, '$notif_msg');";

                                            if (mysqli_multi_query($conn, $sql9)) {
                                                //echo "New records created successfully";
                                            } else {
                                                //echo "Error: " . $sql9 . "<br>" . mysqli_error($conn);
                                            }

                                            while (mysqli_more_results($conn)) {
                                                mysqli_next_result($conn);
                                            }
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