<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = [];
$success_msgs = [];
$error_msgs = [];

if (empty($_SESSION['id']) || is_null($_SESSION['id'])) {
    $response_msg['status'] = 'error';
    $error_msgs[] = 'Error: Session ID empty! Please login again to continue!';
} else {
    if (empty($_POST["tourney-id"]) || is_null($_POST["tourney-id"])) {
        $response_msg['status'] = 'error';
        $error_msgs[] = 'Error: Tournament ID Missing!';
    } else {
        $confirming_player_id = $_SESSION['id'];
        $tourney_id = mysqli_real_escape_string($conn, clean_input($_POST["tourney-id"]));

        $sql = "SELECT * FROM tournaments_log WHERE tournament_id = $tourney_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($confirming_player_id === $row['tournament_by']) {
                    if ($row['status'] === 'ready') {
                        $sql1 = "SELECT NOW() AS now_timestamp";
                        $result1 = mysqli_query($conn, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $now_timestamp = $row1['now_timestamp'];
                            }
                        } else {
                            $now_timestamp = '0000-00-00 00:00:00';
                        }

                        if (($row['start_date'] . ' ' . $row['start_time']) >= $now_timestamp) {
                            // $sql2 = "UPDATE tournaments_log SET status = 'confirmed', confirmed_timestamp = NOW() WHERE tournament_id = $tourney_id";

                            // if (mysqli_query($conn, $sql2)) {
                            //     $response_msg['status'] = 'success';
                            //     $success_msgs[] = 'Success: Tournament Confirmed successfully!';

                            //     $sql3 = "SELECT * FROM tourney_players WHERE tourney_id = $tourney_id AND player_id <> $confirming_player_id";
                            //     $result3 = mysqli_query($conn, $sql3);

                            //     if (mysqli_num_rows($result3) > 0) {
                            //         while ($row3 = mysqli_fetch_assoc($result3)) {
                            //         }
                            //     } else {
                            //     }
                            // } else {
                            //     $response_msg['status'] = 'error';
                            //     $error_msgs[] = 'Error: ' . mysqli_error($conn);
                            // }
                        } else {
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $error_msgs[] = 'Error: Only Ready Tournaments can be Confirmed!';
                    }
                } else {
                    $response_msg['status'] = 'error';
                    $error_msgs[] = 'Error: You cannot Confirm this Tournament! Only the Tournament owner can Confirm this Tournament.';
                }
            }
        } else {
            $response_msg['status'] = 'error';
            $error_msgs[] = 'Error: Invalid Tournament ID!';
        }
    }
}

$response_msg['success_msgs'] = $success_msgs;
$response_msg['error_msgs'] = $error_msgs;

mysqli_close($conn);

echo json_encode($response_msg);
