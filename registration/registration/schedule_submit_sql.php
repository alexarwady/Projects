<?php
session_start();
$start = 0;
$end = 0;
$day = 0;
$username = $_SESSION["username"];

// initializing variables
$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['schedule_submission'])) {
        // receive all input values from the form
        $day = mysqli_real_escape_string($db, $_POST['day']);
        $start = mysqli_real_escape_string($db, $_POST['start']);
        $end = mysqli_real_escape_string($db, $_POST['end']);

        if($start<$end){
        for($i=$start; $i<$end; $i++)
        {
            $row1 = $i;
            $column1 = $day;
            $query = "INSERT INTO schedule (row1, column1, username) 
                  VALUES('$row1', '$column1', '$username')";
            mysqli_query($db, $query);
        }
        $_SESSION['success_schedule'] = "Shift Added. Go ahead and Submit other shifts.";
        }
        else $_SESSION['failure_schedule'] = "Start time and end time incompatible";
}
?>