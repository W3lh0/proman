<?php
require_once "../model/model.php";

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $dataTask = trim($_POST['data_task']);
    $timeTask = $_POST['time_task'];

    if (empty($title) || empty($dataTask) || empty($timeTask)) {
        $error_message = "Title, dataTask or timeTask empty";
    } else {
        if (titleExists("tasks", $title)) {
            $error_message = "I'm sorry, but looks like \"" . $title . "\" already exists.";

        } else {
            add_task($title, $dataTask, $timeTask);
            header('Refresh:4; url=task_list.php');
            $confirm_message = 'Task added successfully! Moving to task list..';
        }
    }
}

require "../views/task.php";