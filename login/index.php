<?php
include '../header.php';
?>

<link rel="stylesheet" href="./index.css">

<div class="container-fluid vh-100">
    <div class="row h-100">
        <div id="login-image" class="col h-100 bg-dark"></div>
        <div class="col h-100 d-flex align-items-center justify-content-center px-5">
            <div class="flex-grow-1">
                <h1>Login</h1>
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./index.js"></script>

<?php
include '../footer.php';
?>