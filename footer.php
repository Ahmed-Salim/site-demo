<footer class="bg-light p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn btn-outline-secondary border-0" href="
                        <?php

                        if (basename(getcwd()) === basename(__DIR__)) {
                            echo './help';
                        } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            echo '../help';
                        } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            echo '../../help';
                        } else {
                        }

                        ?>
                        ">SUPPORT</a></li>
                        <li class="breadcrumb-item"><a class="btn btn-outline-secondary border-0" href="
                        <?php

                        if (basename(getcwd()) === basename(__DIR__)) {
                            echo './terms';
                        } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            echo '../terms';
                        } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            echo '../../terms';
                        } else {
                        }

                        ?>
                        ">TERMS</a></li>
                        <li class="breadcrumb-item"><a class="btn btn-outline-secondary border-0" href="
                        <?php

                        if (basename(getcwd()) === basename(__DIR__)) {
                            echo './privacy';
                        } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            echo '../privacy';
                        } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            echo '../../privacy';
                        } else {
                        }

                        ?>
                        ">PRIVACY</a></li>
                        <li class="breadcrumb-item"><a class="btn btn-outline-secondary border-0" href="
                        <?php

                        if (basename(getcwd()) === basename(__DIR__)) {
                            echo './about';
                        } elseif (basename(dirname(getcwd())) === basename(__DIR__)) {
                            echo '../about';
                        } elseif (basename(dirname(getcwd())) === 'dashboard') {
                            echo '../../about';
                        } else {
                        }

                        ?>
                        ">ABOUT US</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="fw-bold"><span class="border border-danger rounded-circle bg-white text-danger px-1 py-2 me-2">18+</span> OVER 18 ONLY</p>
                <p>© 2021 COMPANY. ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>