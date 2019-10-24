<?php
session_start();

// initializing variables
$first_name = "";
$last_name = "";
$title = "";
$phone = "";
$institution = "";
$events = "";
$fund = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER COMPANION
if (isset($_POST['reg_companion'])) {
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $institution = mysqli_real_escape_string($db, $_POST['institution']);
    $events = mysqli_real_escape_string($db, $_POST['events']);
    $fund = mysqli_real_escape_string($db, $_POST['fund']);

    if (empty($_POST['firstname'])) {
        array_push($errors, "First Name is required");}

    if (empty($_POST['lastname'])) {
        array_push($errors, "Last Name is required");}

    if (count($errors) == 0) {

        $query = "INSERT INTO companion (firstname, lastname, title, phone, institution, events, fund) 
  			  VALUES('$first_name', '$last_name', '$title', '$phone', '$institution', '$events', '$fund')";
        mysqli_query($db, $query);
        $_SESSION['success_companion'] = "Companion added";
    }
}

?>