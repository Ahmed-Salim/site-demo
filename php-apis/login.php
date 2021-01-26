<?php

session_start();

include_once './db-config.php';
include_once './clean-input.php';

$email = mysqli_real_escape_string($conn, clean_input($_POST["email"]));
$user_password = mysqli_real_escape_string($conn, clean_input($_POST["password"]));

$response_msg = array();

if (isset($email) && isset($user_password)) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($user_password, $row['user_password'])) {
                $response_msg['status'] = 'success';
                $response_msg['description'] = 'Login successfull!';

                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
            } else {
                $response_msg['status'] = 'error';
                $response_msg['description'] = 'Invalid Email or Password';
            }
        }
    } else {
        $response_msg['status'] = 'error';
        $response_msg['description'] = 'Invalid Email or Password';
    }
} else {
    $response_msg['status'] = 'error';
    $response_msg['description'] = 'All fields required!';
}

mysqli_close($conn);

echo json_encode($response_msg);
