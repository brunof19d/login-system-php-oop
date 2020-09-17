<!-- Info page  -->
<div class="card-header p-5 text-center">
    <h3 class="h2 mb-0">
        <?php $message->messageHeaderHtml(); ?>
    </h3>
    <?php if ($message->messageLogout() == TRUE) : ?>
    <p class="lead mt-3">
            <a class="btn btn-primary" href="<?= SITE_URL . 'admin/index.php?logout=true'; ?>" role="button">Logout</a>
    </p>
    <?php endif; ?>
</div>
<!-- Form Login -->
<div class="card-body p-5">
    <?php require_once "alert.php"; ?>
    <!-- Input Email -->
    <div class="form-group">
        <label for="inputEmail">Email:</label>
        <input type="email" name="input_email" id="inputEmail" placeholder="user@email.com" class="form-control"
               required/>
    </div>
    <!-- Input Password -->
    <div class="form-group">
        <label for="inputPassword">Password:</label>
        <input type="password" name="input_password" id="inputPassword" placeholder="*****" class="form-control"
               required/>
    </div>
    <!-- Button -->
    <div class="form-group">
        <button name="<?php $message->defineInputAttribute();?>" class="btn btn-dark btn-block"><?php $message->defineButton(); ?></button>
    </div>
</div>
