<?php

require_once "../utils/common.php";
require_once "../model/model.php";

$title = "Add Task";
$projects = get_all_projects();

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
            <span>Task Date:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="date" name="dataTask" id="dataTask" required>
        <label for="timeTask">
            <span>Task Time</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="number" name="timeTask" id="timeTask" min="1" max="120" step="1" required> 
        <label for="projectId">
            <span>Project</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <select name="projectId" id="projectId" required>
            <option value="" disable selected hidden>Select a project</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?php  echo escape($project['id']); ?>">
                    <?php echo escape($project['title']); ?>
                </option>
            <?php endforeach; ?>
        <select>
        <input type="submit" name="submit" value="add">
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>