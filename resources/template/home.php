<?php require_once __DIR__ . '/../includes/header.php'; ?>

    <div class="container bg-light mt-5 border">

        <form method="POST" action="/make-login" class="m-5 p-5">

            <?php require_once __DIR__ . '/../includes/alert.php'; ?>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*********">
            </div>

            <input type="hidden" name="csrf_token" value="<?= $token; ?>">

            <button type="submit" class="btn btn-primary w-100">Login</button>

        </form>

    </div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>