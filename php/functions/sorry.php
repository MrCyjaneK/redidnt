<?php
if (!REDIDNT) die();
function sorry($title, $message) {
    ?>
    <div style="padding-left:15px">
        <h2><?= htmlspecialchars($title); ?></h2>
        <p><?= htmlspecialchars($message) ?></p>
        <a onclick="return window.history.back();" href="/">Go Back</a>
    </div>
    <?php
    return 0;
}