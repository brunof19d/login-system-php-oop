<?php if ($view_message) : ?>
    <div class="alert <?= $view_message['class'] ?>">
        <?= $view_message['message'] ?>
    </div>
<?php endif; ?>