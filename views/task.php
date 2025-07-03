<?php
if (!empty($_GET['id'])) {
    $title = 'Update Task'; 
} else {
    $title = 'Add Task'; 
}

require_once "../utils/common.php";

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
        <input type="text" placeholder="New task" name="title" id="title" value="<?php echo escape($task_title); ?>" required>
        <label for="dataTask">
            <span>Task Date:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="date" name="dataTask" id="dataTask" value="<?php echo escape($data_task); ?>" required>
        <label for="timeTask">
            <span>Task Time</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="number" name="timeTask" id="timeTask" min="1" max="120" step="1" value="<?php echo escape($time_task) ?>" required> 
        <?php if (empty($id)) { ?>
            <label for="projectId">
                <span>Project</span>
                <strong><abbr title="required">*</abbr></strong>
            </label>
            <select name="projectId" id="projectId" required>
                <option value="" disable selected hidden>Select a project</option>
                    <?php foreach ($projects as $project): ?>
                        <option value="<?php echo escape($project['id']); ?>">
                            <?php echo escape($project['title']); ?>
                        </option>
                    <?php endforeach; ?>
            </select>
        <?php } else { ?>
            <input type="hidden" name="projectId" value="<?php echo escape($project_id); ?>">
        <?php } ?>
        <?php if (!empty($id)) { ?>
        <input type="hidden" name="id" value="<?php echo escape($id) ?>" />      
        <?php } ?>
        <input type="submit" name="submit" value="<?php echo (isset($id) and (!empty($id))) ? 'Update' : 'Add'; ?>">
        <?php if (!empty($id)) { ?>
        <input type="submit" name="deleteButton" value="Delete">
        <?php } ?>
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>