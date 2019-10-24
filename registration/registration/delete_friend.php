<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
$query = "DELETE FROM `users` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
$query = "DELETE FROM `schedule` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
$query = "DELETE FROM `attendance` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
$query = "DELETE FROM `task` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
$query = "DELETE FROM `totalhours` WHERE `username`= '$_GET[username]'";
$result = $db->query($query);
header("refresh:0; url=attendance_summary.php");