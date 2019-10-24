<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
$query = "DELETE FROM `schedule` WHERE `username`= '$_SESSION[username]'";
$result = $db->query($query);
if($result)
    header("refresh:0; url=schedule_friend.php");
?>