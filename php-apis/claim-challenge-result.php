<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();

$response_msg['status'] = '';
$response_msg['description'] = '';

if (empty($_SESSION['id']) || is_null($_SESSION['id'])) {
    $response_msg['status'] = 'error';
    $response_msg['description'] .= 'Error: Session ID empty! Please login again to continue!';
} else {
    if (empty($_POST["challenge-id"]) || is_null($_POST["challenge-id"]) || empty($_POST["claimed-result"]) || is_null($_POST["claimed-result"])) {
        $response_msg['status'] = 'error';
        $response_msg['description'] .= 'Error: Required fields missing!';
    } else {
        $claim_by_id = $_SESSION['id'];
        $challenge_id = mysqli_real_escape_string($conn, clean_input($_POST["challenge-id"]));
        $claimed_result = mysqli_real_escape_string($conn, clean_input($_POST["claimed-result"]));

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['challenge_by'] === $claim_by_id || $row['accepted_by'] === $claim_by_id) {
                    if ($row['status'] === 'confirmed') {
                        if ($claim_by_id === $row['challenge_by']) {
                            $claim_by_claimed_result = $row['challenge_by_claimed_result'];
                            $claim_by_claim_timestamp = $row['challenge_by_claim_timestamp'];
                        } else {
                            $claim_by_claimed_result = $row['accepted_by_claimed_result'];
                            $claim_by_claim_timestamp = $row['accepted_by_claim_timestamp'];
                        }

                        if ((empty($claim_by_claimed_result) || is_null($claim_by_claimed_result)) && (empty($claim_by_claim_timestamp) || is_null($claim_by_claim_timestamp))) {
                            $sql1 = "SELECT NOW() AS now_timestamp";
                            $result1 = mysqli_query($conn, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $now_timestamp = $row1['now_timestamp'];
                                }
                            } else {
                                $now_timestamp = '0000-00-00 00:00:00';
                            }

                            if ($now_timestamp >= ($row['challenge_date'] . ' ' . $row['challenge_time'])) {
                                $challenge_date = new DateTime($row['challenge_date'] . ' ' . $row['challenge_time']);
                                $challenge_datetime_plus_1_hour = $challenge_date->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s');

                                if ($now_timestamp <= $challenge_datetime_plus_1_hour) {
                                    if ($claim_by_id === $row['challenge_by']) {
                                        $sql2 = "UPDATE challenges_log SET challenge_by_claimed_result = '$claimed_result', challenge_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    } else {
                                        $sql2 = "UPDATE challenges_log SET accepted_by_claimed_result = '$claimed_result', accepted_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    }

                                    if (mysqli_query($conn, $sql2)) {
                                        $response_msg['status'] = 'success';
                                        $response_msg['description'] .= 'Success: Challenge result claimed successfully!';

                                        //Determine Challenge Result-------------------------------------------------------------------------------------------------------------
                                    } else {
                                        $response_msg['status'] = 'error';
                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                    }
                                } else {
                                    $response_msg['status'] = 'error';
                                    $response_msg['description'] .= 'Error: You have failed to declare your Challenge result within one (1) hour of the set Challenge date and time!';

                                    if ($claim_by_id === $row['challenge_by']) {
                                        $sql2 = "UPDATE challenges_log SET challenge_by_claimed_result = 'loss', challenge_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    } else {
                                        $sql2 = "UPDATE challenges_log SET accepted_by_claimed_result = 'loss', accepted_by_claim_timestamp = NOW() WHERE challenge_id = $challenge_id";
                                    }

                                    if (mysqli_query($conn, $sql2)) {
                                        $response_msg['status'] = 'error';
                                        $response_msg['description'] .= 'Error: A loss has been declared for You!';

                                        //Determine Challenge Result-------------------------------------------------------------------------------------------------------------
                                    } else {
                                        $response_msg['status'] = 'error';
                                        $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                    }
                                }
                            } else {
                                $response_msg['status'] = 'error';
                                $response_msg['description'] .= 'Error: Challenge has not been started yet!';
                            }
                        } else {
                            $response_msg['status'] = 'error';
                            $response_msg['description'] .= 'Error: You have already claimed your result! It cannot be changed.';
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $response_msg['description'] .= 'Error: Challenge not in Confirmed state!';
                    }
                } else {
                    $response_msg['status'] = 'error';
                    $response_msg['description'] .= 'Error: You are not a part of this challenge!';
                }
            }
        } else {
            $response_msg['status'] = 'error';
            $response_msg['description'] .= 'Error: Invalid Challenge ID!';
        }
    }
}

mysqli_close($conn);

echo json_encode($response_msg);
