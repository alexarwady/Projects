<?php
session_start();
$username = "";
$message = "";
$errors = array();

// initializing variables
$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['message_submission'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['name']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    if (empty($_POST['message'])) {
        array_push($errors, "Message required");}

    if (count($errors) == 0) {

        $query = "SELECT * FROM `comments` WHERE username="."'".$username."'";
        $result = $db->query($query);

        if ($result->num_rows > 0) { $query = "UPDATE `comments` SET `comment_text`="."'".$message."'"." WHERE `username`="."'".$username."'";
            mysqli_query($db, $query);}
        else{
            $query = "INSERT INTO `comments` (username, comment_text) 
  			  VALUES('$username', '$message')";
            mysqli_query($db, $query);}
        $_SESSION['success_message'] = "Message sent";
    }
}
?>