<?php

require_once "..utils/common.php";

$title = "Add Task";

ob_start();
require "nav.php";
?>

<div class="container">

    <h1><?php echo escape($title) ?></h1>

    <?php
    if (isset($error_message)) {
        echo "<p class='message'>" . escape($error_message) . "</p>";
    }

    if (isset($confirm_message)) {
        echo "<p class='message_ok'>" . escape($confirm_message) . "</p>";
    }
    ?>

    <form method="post">
        <label for="title">
            <span>Title:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="New task" name="title" id="title" required>
        <label for="dataTask">
            <span>Task Data:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="New Task Data" name="dataTask" id="dataTask" required>
        <label for="timeTask">
            <span>Task Time</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="date" name="timeTask" id="timeTask">
        <input type="submit" name="submit" value="add">
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>