<?php

require_once '../utils/common.php';

if (!empty($_GET['id'])) {
    $title = 'Update project';
} else {
    $title = 'Add Project';
}

ob_start();
require "nav.php";
?>

<div class="container">

    <h1><?php echo escape($title) ?></h1>

    <?php
    if (isset($error_message)) {
        echo "<p class='message_error'>" . escape($error_message) . "</p>";
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
        <input type="text" placeholder="New project" name="title" id="title" value="<?php echo escape($project_title) ?>" required>
        <label for="category">
            <span>Category</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <select name="category" id="category" required>
            <option value="">Select a category</option>
            <option value="Professional" <?php if ($category == 'Professional') {echo ' selected';} ?>>Professional</option>
            <option value="Personal" <?php if ($category == 'Personal') {echo ' selected';} ?>>Personal</option>
            <option value="School" <?php if ($category == 'School') {echo ' selected';}?>>School</option>
        </select>
        <?php if (!empty($id)) { ?> 
        <input type="hidden" name="id" value="<?php echo escape($id) ?>" />
        <?php } ?>
        <input type="submit" name="submit" value="<?php echo (isset($id) and (!empty($id))) ? 'Update' : 'Add'; ?>">
        <?php if (!empty($id)) { ?>
        <input type="submit" name="deleteButton" value="Delete" />
        <?php } ?>
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>