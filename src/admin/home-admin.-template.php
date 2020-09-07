<?php
require_once "config.php";
require_once "includes/header.php";
$view_message = get_message();
$user = $user_repository->searchUsers();
?>

<div class="container mt-2 text-center">
    <h5>Admin Page</h5>
    <a href="register-admin-controller.php" class="btn btn-primary m-3">Create User</a>
</div>

<div class="container mt-2">

    <?php include 'view/alert.php'; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col" width="80%" class="text-center">Email</th>
                <th scope="col" width="10%">Active</th>
                <th scope="col" width="5%" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $a) :  ?>
                <tr>
                    <th scope="row"><?= $a['user_id']; ?></th>
                    <td class="text-center"><?= $a['email_user']; ?></td>
                    <td><?= $a['active_user']; ?></td>
                    <td><button type="button" class="btn btn-danger">Delete User</button></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once "includes/footer.php"; ?>