<?php include '../../../header.php'; ?>

<div class="container my-5">
    <h1 class="text-center">

        <?php

        if (isset($_GET['challenge-id']) && !empty($_GET['challenge-id'])) {
            include_once '../../../php-apis/db-config.php';
            include_once '../../../php-apis/clean-input.php';

            $challenge_id = mysqli_real_escape_string($conn, clean_input($_GET["challenge-id"]));

            echo 'Challenge # ' . $challenge_id;
        } else {
            header("Location: ../");
            die();
        }

        ?>

    </h1>
</div>

<?php include '../../../footer.php'; ?>