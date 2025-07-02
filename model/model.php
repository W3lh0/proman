<?php
// model/model.php
require "connection.php";

$connection = db_connect();

function get_all_projects()
{
    try {
        global $connection;

        $sql = 'SELECT * FROM projects ORDER BY title';
        $projects = $connection->query($sql);

        return $projects;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function get_project($id)
{
    try {
        global $connection;

        $sql = 'SELECT * FROM projects WHERE id = ?';
        $project = $connection->prepare($sql);
        $project->bindValue(1, $id, PDO::PARAM_INT);
        $project->execute();

        return $project->fetch();
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

function get_all_projects_count()
{
    try {
        global $connection;

        $sql = 'SELECT COUNT(id) AS nb FROM projects';
        $statement = $connection->query($sql)->fetch();

        $projectCount = $statement['nb'];

        return $projectCount;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function get_all_tasks()
{
    try {
        global $connection;

        $sql = 'SELECT
                    T.title AS TaskTitle,
                    P.title AS ProjectTitle,
                    T.data_task
                FROM
                    tasks AS T
                INNER JOIN
                    projects AS P ON T.project_id = P.id
                ORDER BY
                    P.title ASC,
                    T.data_task DESC';
        $tasks = $connection->query($sql);

        return $tasks;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function get_all_tasks_count()
{
    try {
        global $connection;

        $sql = 'SELECT COUNT(id) AS nb FROM tasks';
        $statement = $connection->query($sql)->fetch();

        $taskCount = $statement['nb'];

        return $taskCount;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function add_project($title, $category, $id) {
    try {
        global $connection;

        if ($id) {
            $sql = 'UPDATE projects SET title = ?, category = ? WHERE id = ?';
        } else {
            $sql = 'INSERT INTO projects(title, category) VALUES(?, ?)';
        }
        $statement = $connection->prepare($sql);
        $new_project = array($title, $category);

        if ($id) {
            $new_project = array($title, $category, $id);
        }

        $affectedLines = $statement->execute($new_project);

        return $affectedLines;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function add_task($title, $dataTask, $titleTask, $projectId) 
{
    try {
        global $connection;

        $sql = 'INSERT INTO tasks(title, data_task, time_task, project_id) VALUES(?, ?, ?, ?)';

        $statement = $connection->prepare($sql);
        $new_project = array($title, $dataTask, $titleTask, $projectId);

        $affectedLines = $statement->execute($new_project);
        
        return $affectedLines;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function titleExists($table, $title)
{
    try {
        global $connection;

        $sql = 'SELECT title FROM ' . $table . ' WHERE title = ?';
        $statement = $connection->prepare($sql);
        $statement->execute(array($title));

        if ($statement->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}