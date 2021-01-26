<?php

session_start();

if (isset($_SESSION['id'])) {
    if (str_contains(getcwd(), 'dashboard')) {
    } else {
        header("Location: /demo-site/dashboard/");
        die();
    }
} else {
    if (str_contains(getcwd(), 'demo-site')) {
    } else {
        header("Location: /demo-site/php-apis/logout.php");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Demo Site</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow">
        <div class="container-fluid">
            <ul class="navbar-nav me-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/demo-site"><i class="bi bi-person-fill me-2"></i>ABC</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/demo-site/login">Enter</a></li>
                        <li><a class="dropdown-item" href="/demo-site/register">Register</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/demo-site/ranking/">Ranking</a></li>
                        <li><a class="dropdown-item" href="/demo-site/help/">Help</a></li>
                    </ul>
                </li>
            </ul>
            <a class="navbar-brand" href="/demo-site">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-light" aria-current="page" href="/demo-site/login">ENTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>