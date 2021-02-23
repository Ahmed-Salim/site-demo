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
    if (empty($_POST["challenge-id"]) || is_null($_POST["challenge-id"])) {
        $response_msg['status'] = 'error';
        $response_msg['description'] .= 'Error: Challenge ID missing!';
    } else {
        $confirm_by_id = $_SESSION['id'];
        $challenge_id = mysqli_real_escape_string($conn, clean_input($_POST["challenge-id"]));

        $sql = "SELECT * FROM challenges_log WHERE challenge_id = $challenge_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['challenge_by'] === $confirm_by_id) {
                    if ($row['status'] === 'accepted') {
                        $sql1 = "SELECT NOW() AS now_timestamp";
                        $result1 = mysqli_query($conn, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $now_timestamp = $row1['now_timestamp'];
                            }
                        } else {
                            $now_timestamp = null;
                        }

                        if (($row['challenge_date'] . ' ' . $row['challenge_time']) >= $now_timestamp) {
                            $sql2 = "UPDATE challenges_log SET status = 'confirmed', confirmed_timestamp = NOW() WHERE challenge_id = $challenge_id";

                            if (mysqli_query($conn, $sql2)) {
                                $response_msg['status'] = 'success';
                                $response_msg['description'] .= 'Success: Challenge confirmed successfully!';

                                $notif_for = $row['accepted_by'];
                                $notif_msg = 'Challenge # ' . $row['challenge_id'] . ' has been accepted by its owner. Your Challenge is set to be played on: ' . $row['challenge_date'] . ' ' . $row['challenge_time'];

                                $sql3 = "INSERT INTO notifications (notif_for, notif_msg) VALUES ($notif_for, '$notif_msg')";

                                if (mysqli_query($conn, $sql3)) {
                                    $response_msg['status'] = 'success';
                                    $response_msg['description'] .= 'Success: Notification sent successfully!';
                                } else {
                                    $response_msg['status'] = 'error';
                                    $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                                }
                            } else {
                                $response_msg['status'] = 'error';
                                $response_msg['description'] .= 'Error: ' . mysqli_error($conn);
                            }
                        } else {
                            $response_msg['status'] = 'error';
                            $response_msg['description'] .= 'Error: Challenge date time has been exceeded! This Challenge can no longer be confirmed!';

                            //refund functionality ...
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $response_msg['description'] .= 'Error: Challenge not in Accepted state!';
                    }
                } else {
                    $response_msg['status'] = 'error';
                    $response_msg['description'] .= 'Error: You cannot confirm this Challenge! Only the Challenge owner can confirm this challenge!';
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
