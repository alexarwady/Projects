<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
$query = "DELETE FROM `schedule` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
if($result)
    header("refresh:0; url=show_hours_user.php?username="."$_GET[username]");
?>
