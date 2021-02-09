<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$response_msg = array();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (empty($_POST["tourney-game"]) || empty($_POST["tourney-console"]) || empty($_POST["tourney-amount"]) || empty($_POST["tourney-players"])) {
        $response_msg['status'] = 'error';
        $response_msg['description'] = 'Required Fields Empty!';
    } else {
        $user_id = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tourney_players = mysqli_real_escape_string($conn, clean_input($_POST["tourney-players"]));

                if ($tourney_players >= 2) {
                    $tourney_amount = mysqli_real_escape_string($conn, clean_input($_POST["tourney-amount"]));

                    if ($tourney_amount >= 10) {
                        if ($row['balance'] >= $tourney_amount) {
                            $new_balance = $row['balance'] - $tourney_amount;

                            $sql2 = "UPDATE users SET balance=$new_balance WHERE id=$user_id";

                            if (mysqli_query($conn, $sql2)) {
                                $response_msg['status'] = 'success';
                                $response_msg['description'] = 'Balance Updated Successfully!';

                                $tourney_game = mysqli_real_escape_string($conn, clean_input($_POST["tourney-game"]));
                                $tourney_console = mysqli_real_escape_string($conn, clean_input($_POST["tourney-console"]));
                                $tourney_game_mode = mysqli_real_escape_string($conn, clean_input($_POST["tourney-game-mode"]));
                                $tourney_rules = mysqli_real_escape_string($conn, clean_input($_POST["tourney-rules"]));
                                $client_date = mysqli_real_escape_string($conn, clean_input($_POST["client-date"]));

                                $sql3 = "INSERT INTO tournaments_log (tournament_by, game, console, amount, players, game_mode, rules, client_date) VALUES ($user_id, '$tourney_game', '$tourney_console', '$tourney_amount', '$tourney_players', '$tourney_game_mode', '$tourney_rules', '$client_date')";

                                if (mysqli_query($conn, $sql3)) {
                                    $response_msg['description'] .= "\nTournament Created Successfully";
                                } else {
                                    $response_msg['description'] .= "\nError: " . mysqli_error($conn);
                                }
                            } else {
                                $response_msg['status'] = 'error';
                                $response_msg['description'] = "Error updating record: " . mysqli_error($conn);
                            }
                        } else {
                            $response_msg['status'] = 'error';
                            $response_msg['description'] = 'Insufficient Balance for Creating Tournament!';
                        }
                    } else {
                        $response_msg['status'] = 'error';
                        $response_msg['description'] = 'Minimum $10 Required for Creating Tournament!';
                    }
                } else {
                    $response_msg['status'] = 'error';
                    $response_msg['description'] = 'Minimum 2 Players Required for Creating Tournament!';
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
