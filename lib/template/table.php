<table class="table table-striped text-center">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Active</th>
        <th>#</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody style="font-size: 14px;">
    <?php foreach ($userList as $user): ?>
        <tr>
            <th style="width: 5%"><?= $user->getId(); ?></th>
            <td><?= $user->getEmail(); ?></td>
            <td style="width: 5%"><?= $message->switchActiveName($user->getActive()); ?></td>
            <?php if ($user->getActive() == 1): ?>
                <td style="width: 10%"><a href="index.php?inactive=<?= $user->getId(); ?>" class="btn btn-info">Remove access</a></td>
            <?php else : ?>
                <td style="width: 10%"><a href="index.php?active=<?= $user->getId(); ?>" class="btn btn-warning">Active access</a></td>
            <?php endif; ?>
            <td style="width: 10%"><a href="index.php?delete=<?= $user->getId(); ?>" class="btn btn-danger">Delete User</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
