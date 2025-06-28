<?php
$title = 'Task list';

ob_start();
require 'nav.php';
?>

<div class="container">
    <p><a href="../">Go Home</a></p>

    <h1><?php echo $title . " (" . $taskCount . ")" ?></h1>
    <!-- if there is no data yet -->
    <?php if ($taskCount == 0) { ?>
    <div>
        <p> You have not yet added any tasks </p>
        <p><a href='../controllers/task.php'></a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($tasks as $task) : ?>
        <li>
            Title: <?php echo htmlspecialchars($task["TaskTitle"]); ?> (Date: <?php echo htmlspecialchars($task["data_task"]); ?>, Project: <?php echo htmlspecialchars($task["ProjectTitle"]); ?>)
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>