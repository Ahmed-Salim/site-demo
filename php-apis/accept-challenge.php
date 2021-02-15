<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (empty($_POST["challenge-id"]) || empty($_POST["challenge-date"]) || empty($_POST["challenge-time"])) {
        $response_msg['status'] = 'error';
        $response_msg['description'] = 'Required Fields Empty!';
    } else {
        $accept_by_id = $_SESSION['id'];
        $challenge_id = mysqli_real_escape_string($conn, clean_input($_POST["challenge-id"]));
        $challenge_date = mysqli_real_escape_string($conn, clean_input($_POST["challenge-date"]));
        $challenge_time = mysqli_real_escape_string($conn, clean_input($_POST["challenge-time"]));

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($accept_by_id === $row['challenge_by']) {
                    $response_msg['status'] = 'error';
                    $response_msg['description'] = 'Error: You Cannot Accept Your Own Challenge!';
                } else {
                    if ($row['status'] === 'open') {
                        if ($challenge_date > date_format(date_create($row['created_timestamp']), 'Y-m-d')) {
                            $sql2 = "SELECT * FROM users WHERE id = $accept_by_id";
                            $result2 = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    if ($row2['balance'] >= $row['amount']) {
                                        $challenge_amount = $row['amount'];

                                        $sql3 = "UPDATE users SET balance = (balance - $challenge_amount) WHERE id = $accept_by_id";

                                        if (mysqli_query($conn, $sql3)) {
                                            $response_msg['status'] = 'success';
                                            $response_msg['description'] = 'Success: Balance Updated Successfully!';

                                            $sql4 = "UPDATE challenges_log SET status = 'accepted', accepted_by = $accept_by_id, accepted_timestamp = NOW(), challenge_date = '$challenge_date', challenge_time = '$challenge_time' WHERE challenge_id = $challenge_id";

                                            if (mysqli_query($conn, $sql4)) {
                                                $response_msg['description'] .= 'Success: Challenge Accepted Successfully!';
                                            } else {
                                                $response_msg['status'] = 'error';
                                                $response_msg['description'] = 'Error: ' . mysqli_error($conn);
                                            }
                                        } else {
                                            $response_msg['status'] = 'error';
                                            $response_msg['description'] = 'Error: ' . mysqli_error($conn);
                                        }
                                    } else {
                                        $response_msg['status'] = 'error';
                                        $response_msg['description'] = 'Error: Insufficient Balance for Accepting Challenge!';
                                    }
                                }
                            } else {
                                $response_msg['status'] = 'error';
                                $response_msg['description'] = 'Error: Invalid User ID! Please login again to continue!';
                            }
                        } else {
                            $response_msg['status'] = 'error';
                            $response_msg['description'] = 'Error: Challenge Date Must Be Greater Than Created Date!';
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $response_msg['description'] = 'Error: Challenge Is No Longer Open!';
                    }
                }
            }
        } else {
            $response_msg['status'] = 'error';
            $response_msg['description'] = 'Error: Invalid Challenge ID!';
        }
    }
} else {
    $response_msg['status'] = 'error';
    $response_msg['description'] = 'Session ID missing! Please login again to continue!';
}

mysqli_close($conn);

echo json_encode($response_msg);
