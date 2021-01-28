<?php
include '../../header.php';
?>

<link rel="stylesheet" href="./index.css">

<!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="change-password-form">
                    <fieldset>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password" required>
                            <label for="currentPassword">Current Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
                            <label for="newPassword">New Password</label>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light" form="change-password-form">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="hero bg-dark d-flex align-items-end px-5">
    <h1 class="text-white display-5 fw-bold">
        <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
    </h1>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h3 class="mb-5"><i class="bi bi-person-fill me-3"></i>Account</h3>

            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>
                            <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Username</th>
                        <td>
                            <?php echo $_SESSION['username']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>
                            <?php echo $_SESSION['email']; ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#passwordModal">
                CHANGE PASWORD
            </button>
        </div>
        <div class="col">
            <div class="mb-5 d-flex">
                <i class="bi bi-star-fill fs-5 me-3"></i>
                <h3>My Channels</h3>
                <a class="btn btn-dark ms-auto" href="#" role="button">ADD</a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Channel</th>
                        <th scope="col">Console</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script src="./index1.js"></script>

<?php
include '../../footer.php';
?>