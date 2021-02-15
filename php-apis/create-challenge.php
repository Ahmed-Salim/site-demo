<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (empty($_POST["challenge-game"]) || empty($_POST["challenge-console"]) || empty($_POST["challenge-amount"])) {
        $response_msg['status'] = 'error';
        $response_msg['description'] = 'Required Fields Empty!';
    } else {
        $user_id = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $challengeAmount = mysqli_real_escape_string($conn, clean_input($_POST["challenge-amount"]));

                if ($challengeAmount >= 10) {
                    if ($row['balance'] >= $challengeAmount) {
                        $newBalance = $row['balance'] - $challengeAmount;

                        $sql2 = "UPDATE users SET balance=$newBalance WHERE id=$user_id";

                        if (mysqli_query($conn, $sql2)) {
                            $response_msg['status'] = 'success';
                            $response_msg['description'] = 'Balance Updated Successfully!';

                            $challenge_game = mysqli_real_escape_string($conn, clean_input($_POST["challenge-game"]));
                            $challenge_console = mysqli_real_escape_string($conn, clean_input($_POST["challenge-console"]));
                            $challenge_game_mode = mysqli_real_escape_string($conn, clean_input($_POST["challenge-game-mode"]));
                            $challenge_rules = mysqli_real_escape_string($conn, clean_input($_POST["challenge-rules"]));

                            $sql3 = "INSERT INTO challenges_log (challenge_by, game, console, amount, game_mode, rules) VALUES ($user_id, '$challenge_game', '$challenge_console', '$challengeAmount', '$challenge_game_mode', '$challenge_rules')";

                            if (mysqli_query($conn, $sql3)) {
                                $response_msg['description'] .= "\nChallenge Created Successfully";
                            } else {
                                $response_msg['description'] .= "\nError: " . mysqli_error($conn);
                            }
                        } else {
                            $response_msg['status'] = 'error';
                            $response_msg['description'] = "Error updating record: " . mysqli_error($conn);
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $response_msg['description'] = 'Insufficient Balance for Creating Challenge!';
                    }
                } else {
                    $response_msg['status'] = 'error';
                    $response_msg['description'] = 'Minimum $10 Required for Creating Challenge!';
                }
            }
        } else {
            $response_msg['status'] = 'error';
            $response_msg['description'] = 'Invalid Session ID! Please login again to continue!';
        }
    }
} else {
    $response_msg['status'] = 'error';
    $response_msg['description'] = 'Session ID missing! Please login again to continue!';
}

mysqli_close($conn);

echo json_encode($response_msg);
