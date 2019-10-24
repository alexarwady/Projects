<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "registration");
$get = explode("?","$_GET[date1]");
$get1 = explode("=",$get[1]);

// Check connection
$sql = "DELETE FROM `attendance` WHERE `date1` = '$get[0]' AND username="."'".$_SESSION['username']."'"." AND `start_time`='$get1[1]'";
$result = $conn->query($sql);
if($result)
    header("refresh:0; url=edithours.php");
else
    echo "Not deleted"
?>