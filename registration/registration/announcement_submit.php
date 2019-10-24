<?php
session_start();
$announcement = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['announcement_submit'])) {
    $announcement = mysqli_real_escape_string($db, $_POST['announcement']);

    if (empty($_POST['announcement']))
    {
        array_push($errors, "Announcement is required");
    }

    if (count($errors) == 0) {

        $query = "UPDATE `announcement` SET `announcement` = "."'$announcement'"." WHERE `id` = 1";
        mysqli_query($db, $query);
        $_SESSION['success_announcement'] = "Announcement sent";
    }
}
?>