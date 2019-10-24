<?php
session_start();
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['export'])){
    if($_GET['export'] == 'true'){
        $query = mysqli_query($conn, "SELECT a.firstname, a.lastname, b.total FROM users AS a, totalhours AS b WHERE a.username=b.username AND a.username<>'".$_SESSION['username']."' ORDER BY firstname, lastname");

        $delimiter = ",";
        $filename = "significant_" . date('Ymd') . ".csv"; // Create file name

        //create a file pointer
        $f = fopen('php://memory', 'w');

        //set column headers
        $fields = array('First Name', 'Last Name', 'Total Hours');
        fputcsv($f, $fields, $delimiter);

        //output each row of the data, format line as csv and write to file pointer
        while($row = $query->fetch_assoc()){

            $lineData = array($row['firstname'], $row['lastname'], $row['total']);
            fputcsv($f, $lineData, $delimiter);
        }

        //move back to beginning of file
        fseek($f, 0);

        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        //output all remaining data on a file pointer
        fpassthru($f);

    }
}