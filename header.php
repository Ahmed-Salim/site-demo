<?php

session_start();

if (isset($_SESSION['id'])) {
    if (strpos(getcwd(), '\login') !== false  || strpos(getcwd(), '\register') !== false || strpos(getcwd(), '\demo-site', -10) !== false) {
        header("Location: /demo-site/dashboard/");
        die();
    } else {
    }

    // if (str_contains(getcwd(), '\login') || str_contains(getcwd(), '\register') || str_contains(substr(getcwd(), -10), '\demo-site')) {
    //     header("Location: /demo-site/dashboard/");
    //     die();
    // } else {
    // }
} else {
    if (strpos(getcwd(), '\dashboard') !== false) {
        header("Location: /demo-site/php-apis/logout.php");
        die();
    } else {
    }

    // if (str_contains(getcwd(), '\dashboard')) {
    //     header("Location: /demo-site/php-apis/logout.php");
    //     die();
    // } else {
    // }
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

    <title>Challenge Site</title>
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
                        <li><a class="dropdown-item" href="/demo-site"><i class="bi bi-person-fill me-2"></i>Home</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <?php

                        if (isset($_SESSION['id'])) {

                        ?>

                            <li><a class="dropdown-item" href="/demo-site/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/demo-site/dashboard/find-opponent/">Find Opponent</a></li>
                            <li><a class="dropdown-item" href="#">Challenges</a></li>
                            <li><a class="dropdown-item" href="#">Tournaments</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Deposits</a></li>
                            <li><a class="dropdown-item" href="#">Withdraw</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/demo-site/dashboard/profile/">Profile</a></li>
                            <li><a class="dropdown-item" href="/demo-site/ranking/">Ranking</a></li>
                            <li><a class="dropdown-item" href="/demo-site/dashboard/refer/">Refer Friends</a></li>
                            <li><a class="dropdown-item" href="/demo-site/help/">Help</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/demo-site/php-apis/logout.php">Logout</a></li>

                        <?php

                        } else {

                        ?>

                            <li><a class="dropdown-item" href="/demo-site/login">Enter</a></li>
                            <li><a class="dropdown-item" href="/demo-site/register">Register</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/demo-site/ranking/">Ranking</a></li>
                            <li><a class="dropdown-item" href="/demo-site/help/">Help</a></li>

                        <?php

                        }

                        ?>

                    </ul>
                </li>
            </ul>
            <a class="navbar-brand" href="/demo-site">Challenge Site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <?php

                    if (isset($_SESSION['id'])) {

                    ?>

                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="/demo-site/dashboard/profile/">
                                <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="/demo-site/dashboard/profile/"><i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="/demo-site/dashboard/notifications/"><i class="bi bi-bell-fill"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="/demo-site/dashboard/refer/">REFER FRIENDS</a>
                        </li>

                    <?php

                    } else {

                    ?>

                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="/demo-site/login/">ENTER</a>
                        </li>

                    <?php

                    }

                    ?>

                </ul>
            </div>
        </div>
    </nav>