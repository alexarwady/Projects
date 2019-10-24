<?php

if(!empty($_GET['start_time'])){
    $start2 = explode("?","$_GET[start_time]");
    $date2 = explode("=",$start2[1]);
    $date2 = explode("-",$date2[1]);
    $date3 = $date2[2]."-".$date2[1]."-".$date2[0];
    $date4 = $date2[0]."-".$date2[1]."-".$date2[2];
}

session_start();

// initializing variables
$date = "";
$total = 0;
$start_time="";
$end_time="";
$username = $_SESSION['username'];
$errors = array();
$flag=0;

$db = mysqli_connect('localhost', 'root', '', 'registration');

    if (isset($_POST['attendance_submission'])) {
        if (! empty($_POST['datetime']) && ! empty($_POST['starttime']) && ! empty($_POST['endtime'])){
        // receive all input values from the form
        $date = mysqli_real_escape_string($db, $_POST['datetime']);
        $date = explode("-", $date);
        $date = $date[2]."-".$date[1]."-".$date[0];

        $start_time = mysqli_real_escape_string($db, $_POST['starttime']);
        $end_time = mysqli_real_escape_string($db, $_POST['endtime']);
        $start = explode(":",$_POST['starttime']);
        $ampm1= explode(" ", $_POST['starttime']);

        if($ampm1=="PM"){$start[0]=$start[0]+12;}
        $end = explode(":",$_POST['endtime']);
        $ampm2= explode(" ", $_POST['endtime']);
        if($ampm1=="PM"){$end[0]=$end[0]+12;}
        $diff = (($end[0] - $start[0])*60 + ($end[1] - $start[1]))/60;
        $total = $diff;}

    if (! empty($_POST['datetime']) && ! empty($_POST['starttime']) && empty($_POST['endtime'])){
        // receive all input values from the form
        $date = mysqli_real_escape_string($db, $_POST['datetime']);
        $date = explode("-", $date);
        $date = $date[2]."-".$date[1]."-".$date[0];

        $start_time = mysqli_real_escape_string($db, $_POST['starttime']);
        $query = "INSERT INTO attendance (username,start_time, end_time, date1, total) 
  			  VALUES('$username', '$start_time', '$end_time', '$date', '$total')";
        mysqli_query($db, $query);
        $flag=1;
        $_SESSION['success_starttime'] = "Start Time Added";
    }

    if (empty($_POST['starttime'])) {
        array_push($errors, "Start Time is required");}

    if (empty($_POST['datetime'])) {
        array_push($errors, "Date is required");}

    if (count($errors) == 0 && $flag==0 && empty($_GET['start_time'])) {

        $query = "INSERT INTO attendance (username,start_time, end_time, date1, total) 
  			  VALUES('$username', '$start_time', '$end_time', '$date', '$total')";
        mysqli_query($db, $query);
        $_SESSION['success_hour'] = "Attendance Added";
    }
    if (count($errors) == 0 && $flag==0 && !empty($_GET['start_time'])) {
        $query = "UPDATE `attendance` SET `end_time`='$end_time' WHERE `date1` = '$date4' AND `start_time`='$start2[0]' AND username="."'".$_SESSION['username']."'";
        mysqli_query($db, $query);
        $query = "UPDATE `attendance` SET `total`='$total' WHERE `date1` = '$date4' AND `start_time`='$start2[0]' AND username="."'".$_SESSION['username']."'";
        mysqli_query($db, $query);
        $_SESSION['success_hour'] = "Attendance Updated";
    }
}
?>