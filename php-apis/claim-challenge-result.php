<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();
$response_msg['status'] = '';
$response_msg['description'] = '';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (empty($_POST["challengeId"]) || is_null($_POST["challengeId"]) || empty($_POST["claim"]) || is_null($_POST["claim"])) {
        $response_msg['status'] .= 'error';
        $response_msg['description'] .= 'Error: Required Data Empty!';
    } else {
        $claim_by_id = $_SESSION['id'];
        $challenge_id = mysqli_real_escape_string($conn, clean_input($_POST["challengeId"]));
        $claim = mysqli_real_escape_string($conn, clean_input($_POST["claim"]));

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($claim_by_id === $row['challenge_by'] || $claim_by_id === $row['accepted_by']) {
                    if (($claim_by_id === $row['challenge_by'] && !is_null($row['challenge_by_claimed_result']) && !empty($row['challenge_by_claimed_result'])) || ($claim_by_id === $row['accepted_by'] && !is_null($row['accepted_by_claimed_result']) && !empty($row['accepted_by_claimed_result']))) {
                        $response_msg['status'] .= 'error';
                        $response_msg['description'] .= 'Error: You Have Already Claimed Your Result!';
                    } else {
                        if ($row['status'] === 'accepted') {
                            if ($claim_by_id === $row['challenge_by']) {
                                $sql2 = "UPDATE challenges_log SET challenge_by_claimed_result = '$claim', challenge_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                            } else {
                                $sql2 = "UPDATE challenges_log SET accepted_by_claimed_result = '$claim', accepted_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                            }

                            if (mysqli_query($conn, $sql2)) {
                                $response_msg['status'] .= 'success';
                                $response_msg['description'] .= 'Success: Result Claimed Successfully!';

                                $notif_for = ($claim_by_id === $row['challenge_by']) ? ($row['accepted_by']) : ($row['challenge_by']);

                                $sql6 = "SELECT * FROM users WHERE id = $notif_for";
                                $result6 = mysqli_query($conn, $sql6);

                                if (mysqli_num_rows($result6) > 0) {
                                    while ($row6 = mysqli_fetch_assoc($result6)) {
                                        $notif_msg = strtoupper($row6['username']) . ' have claimed their result for Challenge ID: ' . $challenge_id . '.';

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

                                $sql3 = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
                                $result3 = mysqli_query($conn, $sql3);

                                if (mysqli_num_rows($result3) > 0) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        if (is_null($row3['challenge_by_claimed_result']) || empty($row3['challenge_by_claimed_result']) || is_null($row3['accepted_by_claimed_result']) || empty($row3['accepted_by_claimed_result']) || is_null($row3['challenge_by_claim_timestamp']) || empty($row3['challenge_by_claim_timestamp']) || is_null($row3['accepted_by_claim_timestamp']) || empty($row3['accepted_by_claim_timestamp'])) {
                                        } else {
                                            if (($row3['challenge_by_claimed_result'] === 'win' || $row3['challenge_by_claimed_result'] === 'lose') && ($row3['accepted_by_claimed_result'] === 'win' || $row3['accepted_by_claimed_result'] === 'lose')) {
                                                if ($row3['challenge_by_claimed_result'] === $row3['accepted_by_claimed_result']) {
                                                    $sql4 = "UPDATE challenges_log SET status = 'disputed' WHERE challenge_id = $challenge_id";

                                                    if (mysqli_query($conn, $sql4)) {
                                                        $response_msg['description'] .= 'Error: Challenge Ended With A Dispute! Challenge Status Updated To Disputed!';

                                                        $notif_for_1 = $row['challenge_by'];
                                                        $notif_for_2 = $row['accepted_by'];
                                                        $notif_msg = 'Challenge ID: ' . $challenge_id . ' has ended with a Dispute.';

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
                                                } else {
                                                    $sql4 = "UPDATE challenges_log SET status = 'completed' WHERE challenge_id = $challenge_id";

                                                    if (mysqli_query($conn, $sql4)) {
                                                        $response_msg['description'] .= 'Success: Challenge Ended Successfully!';

                                                        $notif_for_1 = $row['challenge_by'];
                                                        $notif_for_2 = $row['accepted_by'];
                                                        $notif_msg = 'Challenge ID: ' . $challenge_id . ' has ended successfully.';

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

                                                        $winningAmount = ($row3['amount'] * 2);

                                                        if ($row3['challenge_by_claimed_result'] === 'win') {
                                                            $challengeWonBy = $row3['challenge_by'];
                                                        } else {
                                                            $challengeWonBy = $row3['accepted_by'];
                                                        }

                                                        $sql5 = "UPDATE users SET balance = (balance + $winningAmount) WHERE id = $challengeWonBy";
                                                        if (mysqli_query($conn, $sql5)) {
                                                            $response_msg['description'] .= 'Success: Amount Transfered To The Winning Player Successfully!';

                                                            $notif_for_1 = $row['challenge_by'];
                                                            $notif_for_2 = $row['accepted_by'];
                                                            $notif_msg = '$' . $winningAmount . ' awarded to the winning player for winning Challenge ID: ' . $challenge_id . '.';

                                                            $sql10 = "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_1, '$notif_msg');";
                                                            $sql10 .= "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for_2, '$notif_msg');";

                                                            if (mysqli_multi_query($conn, $sql10)) {
                                                                //echo "New records created successfully";
                                                            } else {
                                                                //echo "Error: " . $sql10 . "<br>" . mysqli_error($conn);
                                                            }

                                                            while (mysqli_more_results($conn)) {
                                                                mysqli_next_result($conn);
                                                            }
                                                        } else {
                                                            $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                                        }
                                                    } else {
                                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                                    }
                                                }
                                            } else {
                                                $response_msg['description'] .= 'Error: Invalid Claim!';
                                            }
                                        }
                                    }
                                } else {
                                    $response_msg['description'] .= 'Error: Invalid Challenge ID!';
                                }
                            } else {
                                $response_msg['status'] .= 'error';
                                $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
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
