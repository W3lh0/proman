<?php
require_once '../utils/common.php';

$title = 'Task list';

ob_start();
require 'nav.php';
?>
<div class="container">
  <p><a href="../">Go Home</a></p>

  <h1><?php echo escape($title) . " (" . escape($taskCount) . ")"; ?></h1>
  <!-- If there is no data yet -->
  <?php if ($taskCount == 0) { ?>
  <div>
    <p>You have not yet added any tasks</p>
    <p><a href="../controllers/task.php">Add Task</a></p>
  </div>
  <?php } ?>

  <ul>
  <?php foreach ($tasks as $task) : ?>
    <li>
      <?php echo "Task ID: " . $task['id'] . " - "; ?>
        <a href="../controllers/task.php?id=<?php echo $task['id']; ?>">
            Title: <?php echo escape($task["TaskTitle"]); ?> (Date: <?php echo escape($task["data_task"]); ?>), Project: <?php echo escape($task["ProjectTitle"]); ?>
        </a>
    </li>
  <?php endforeach; ?>
  </ul>

</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>