<?php

session_start();

function urlPrefix()
{
    if (basename(getcwd()) === basename(__DIR__)) {
        return './';
    } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
        return '../';
    } elseif (basename(dirname(dirname(getcwd()))) === basename(__DIR__)) {
        return '../../';
    } elseif (basename(dirname(dirname(dirname(getcwd())))) === basename(__DIR__)) {
        return '../../../';
    } else {
        return './';
    }
}

if (isset($_SESSION['id'])) {
    if (basename(getcwd()) === 'login'  || basename(getcwd()) === 'register'  || basename(getcwd()) === basename(__DIR__)) {
        header("Location: " . urlPrefix() . "dashboard/");
        die();

        // if (basename(getcwd()) === basename(__DIR__)) {
        //     header("Location: ./dashboard");
        //     die();
        // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
        //     header("Location: ../dashboard");
        //     die();
        // } elseif (basename(dirname(getcwd())) === 'dashboard') {
        //     header("Location: ../../dashboard");
        //     die();
        // } else {
        //     header("Location: ../../../dashboard");
        //     die();
        // }
    } else {
    }
} else {
    if (strpos(getcwd(), 'dashboard') === false) {
    } else {
        header("Location: " . urlPrefix() . "php-apis/logout.php");
        die();
    }

    // if (basename(getcwd()) === 'dashboard' || basename(dirname(getcwd())) === 'dashboard') {
    //     header("Location: " . urlPrefix() . "php-apis/logout.php");
    //     die();

    //     // if (basename(getcwd()) === basename(__DIR__)) {
    //     //     header("Location: ./php-apis/logout.php");
    //     //     die();
    //     // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
    //     //     header("Location: ../php-apis/logout.php");
    //     //     die();
    //     // } elseif (basename(dirname(getcwd())) === 'dashboard') {
    //     //     header("Location: ../../php-apis/logout.php");
    //     //     die();
    //     // } else {
    //     //     header("Location: ../../../dashboard");
    //     //     die();
    //     // }
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
                        <li>
                            <a class="dropdown-item" href="
                            <?php

                            echo urlPrefix();

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../';
                            // } else {
                            //     echo '../../../';
                            // }

                            ?>
                            "><i class="bi bi-person-fill me-2"></i>Home</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <?php

                        if (isset($_SESSION['id'])) {

                        ?>

                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard';
                            // } else {
                            //     echo '../../../dashboard';
                            // }

                            ?>
                            ">Dashboard</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/find-opponent/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/find-opponent';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/find-opponent';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/find-opponent';
                            // } else {
                            //     echo '../../../dashboard/find-opponent';
                            // }

                            ?>
                            ">Find Opponent</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/challenges/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/challenges';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/challenges';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/challenges';
                            // } else {
                            //     echo '../../../dashboard/challenges';
                            // }

                            ?>
                            ">Challenges</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/tournaments/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/tournaments';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/tournaments';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/tournaments';
                            // } else {
                            //     echo '../../../dashboard/tournaments';
                            // }

                            ?>
                            ">Tournaments</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/deposits/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/deposits/';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/deposits/';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/deposits/';
                            // } else {
                            //     echo '../../../dashboard/deposits/';
                            // }

                            ?>
                            ">Deposits</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/withdrawal/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/withdrawal/';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/withdrawal/';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/withdrawal/';
                            // } else {
                            //     echo '../../../dashboard/withdrawal/';
                            // }

                            ?>
                            ">Withdraw</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/profile/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/profile';
                            // } else {
                            //     echo '../../../dashboard/profile';
                            // }

                            ?>
                            ">Profile</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'ranking/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './ranking';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../ranking';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../ranking';
                            // } else {
                            //     echo '../../../ranking';
                            // }

                            ?>
                            ">Ranking</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'dashboard/refer/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/refer';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/refer';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/refer';
                            // } else {
                            //     echo '../../../dashboard/refer';
                            // }

                            ?>
                            ">Refer Friends</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'help/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './help';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../help';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../help';
                            // } else {
                            //     echo '../../../help';
                            // }

                            ?>
                            ">Help</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'php-apis/logout.php';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './php-apis/logout.php';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../php-apis/logout.php';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../php-apis/logout.php';
                            // } else {
                            //     echo '../../../php-apis/logout.php';
                            // }

                            ?>
                            ">Logout</a></li>

                        <?php

                        } else {

                        ?>

                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'login/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './login';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../login';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../login';
                            // } else {
                            //     echo '../../../login';
                            // }

                            ?>
                            ">Enter</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'register/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './register';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../register';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../register';
                            // } else {
                            //     echo '../../../register';
                            // }

                            ?>
                            ">Register</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'ranking/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './ranking';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../ranking';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../ranking';
                            // } else {
                            //     echo '../../../ranking';
                            // }

                            ?>
                            ">Ranking</a></li>
                            <li><a class="dropdown-item" href="
                            <?php

                            echo urlPrefix() . 'help/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './help';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../help';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../help';
                            // } else {
                            //     echo '../../../help';
                            // }

                            ?>
                            ">Help</a></li>

                        <?php

                        }

                        ?>

                    </ul>
                </li>
            </ul>
            <a class="navbar-brand" href="
            <?php

            echo urlPrefix();

            // if (basename(getcwd()) === basename(__DIR__)) {
            //     echo './';
            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
            //     echo '../';
            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
            //     echo '../../';
            // } else {
            //     echo '../../../';
            // }

            ?>
            ">Challenge Site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <?php

                    if (isset($_SESSION['id'])) {

                    ?>

                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="
                            <?php

                            echo urlPrefix() . 'dashboard/profile/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/profile';
                            // } else {
                            //     echo '../../../dashboard/profile';
                            // }

                            ?>
                            ">
                                <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="
                            <?php

                            echo urlPrefix() . 'dashboard/profile/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/profile';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/profile';
                            // } else {
                            //     echo '../../../dashboard/profile';
                            // }

                            ?>
                            "><i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="
                            <?php

                            echo urlPrefix() . 'dashboard/notifications/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/notifications';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/notifications';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/notifications';
                            // } else {
                            //     echo '../../../dashboard/notifications';
                            // }

                            ?>
                            "><i class="bi bi-bell-fill"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="
                            <?php

                            echo urlPrefix() . 'dashboard/refer/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './dashboard/refer';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../dashboard/refer';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../dashboard/refer';
                            // } else {
                            //     echo '../../../dashboard/refer';
                            // }

                            ?>
                            ">REFER FRIENDS</a>
                        </li>

                    <?php

                    } else {

                    ?>

                        <li class="nav-item">
                            <a class="btn btn-lg btn-outline-secondary border-0" aria-current="page" href="
                            <?php

                            echo urlPrefix() . 'login/';

                            // if (basename(getcwd()) === basename(__DIR__)) {
                            //     echo './login';
                            // } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            //     echo '../login';
                            // } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            //     echo '../../login';
                            // } else {
                            //     echo '../../../login';
                            // }

                            ?>
                            ">ENTER</a>
                        </li>

                    <?php

                    }

                    ?>

                </ul>
            </div>
        </div>
    </nav>