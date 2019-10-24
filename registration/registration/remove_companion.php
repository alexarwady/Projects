<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "registration");
$get = explode("?","$_GET[firstname]");
$get1 = explode("=",$get[1]);

// Check connection
$sql = "DELETE FROM `companion` WHERE `firstname` = '$get[0]' AND `lastname` ='$get1[1]'";
$result = $conn->query($sql);
if($result)
    header("refresh:0; url=companion_summary.php");
else
    echo "Not deleted"
?>
