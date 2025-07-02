<?php
require_once "../model/model.php";
require "../utils/common.php";

$task_title = '';

if (isset($_GET['id'])) {
    list($id, $task_title, $data_task, $time_task, $project_id) = get_task($_GET['id']);
}

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $dataTask = trim($_POST['dataTask']);
    $timeTask = $_POST['timeTask'];
    $projectId = $_POST['projectId'];
    $id = null;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (empty($title) || empty($dataTask) || empty($timeTask) || empty($projectId) ) {
        $error_message = "One or more fields are empty";
    } else {
        if (titleExists("tasks", $title) && $id == null) {
            $error_message = "I'm sorry, but looks like \"" . $title . "\" already exists.";
        } else {
            if (add_task($title, $dataTask, $timeTask, $projectId, $id)) {
                header('Refresh:4; url=task_list.php');
                if (!empty($id)) {
                    $confirm_message = escape($title) . ' updated successfully';
                } else {
                    $confirm_message = escape($title) . ' added successfully';
                }
            } else {
                $error_message = "Something went wrong";
            }
        }
    }
}

require "../views/task.php";