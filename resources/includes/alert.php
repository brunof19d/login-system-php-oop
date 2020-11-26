<?php if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?= $_SESSION['class']; ?>">
        <?= $_SESSION['message']; ?>
    </div>

    <?php
    unset($_SESSION['message']);
    unset($_SESSION['class']);
endif;
?>