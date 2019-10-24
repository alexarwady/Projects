<?php
session_start();

// initializing variables
$date = "";
$title = "";
$description = "";
$username = $_SESSION['username'];
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['task_submit'])) {
    $date = mysqli_real_escape_string($db, $_POST['datetime']);
    $title = mysqli_real_escape_string($db, $_POST['tasktitle']);
    $description = mysqli_real_escape_string($db, $_POST['taskdescription']);

    if (empty($_POST['tasktitle']))
    {
        array_push($errors, "Task Title is required");
    }

    if (empty($_POST['taskdescription']))
    {
        array_push($errors, "Task Description is required");
    }

    if (count($errors) == 0) {

        $query = "INSERT INTO task (username, date1, title, description) 
  			  VALUES('$username', '$date', '$title', '$description')";
        mysqli_query($db, $query);
        $_SESSION['success_task'] = "Task added";
    }
}

?>