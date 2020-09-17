<?php
if ($msg) : ?>
    <div class="alert <?= $msg['class'] ?>">
        <?= $msg['message'] ?>
    </div>
<?php endif; ?>