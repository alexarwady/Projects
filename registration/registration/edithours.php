<!DOCTYPE html>
<html>

<head>
    <title>Edit Attendance</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #3B056F;
            font-family: 'Open Sans', sans-serif;
            font-size: 25px;
            text-align: center;
        }
        th {
            background-color: #3B056F;
            color: white;
        }
        tr:nth-child(even) {background-color: rgba(242, 242, 242, 0.8);}
        a{text-decoration: none;}
    </style>
</head>

<header>
    <div class="container">
        <img src="Picture4.png" width="280" height="90" style="padding: 10px 10px 5px 100px;">

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="edithours.php">Attendance</a></li>
                <li><a href="edittask.php">Tasks</a></li>
                <li><a href="schedule_friend.php">My schedule</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

<br style="line-height: 10px" />

<table>
    <tr>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Hours</th>
        <th>Options</th>
    </tr>
    <?php
    session_start();
    $total=0;
    $conn = mysqli_connect("localhost", "root", "", "registration");
    // Check connection

    $sql = "SELECT `date1`, `start_time`, `end_time`, `total` FROM `attendance` WHERE username="."'".$_SESSION['username']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["date1"]. "</td><td>" . $row["start_time"] . "</td><td>"
                . $row["end_time"]. "</td><td>".$row["total"]."</td><td><a href=remove_date.php?date1=".$row["date1"]."?start_time=".$row['start_time'].">Remove</a><a href=hour_update.php?start_time=".$row["start_time"]."?date1=".$row["date1"]."> / Update</a></td></tr>";
            $total = $total + $row["total"];
        }
        echo "<tr><td></td><td></td><td></td><td>"."Total = ".$total."</td><td></td></tr>";
        echo "</table>";
    }
    $conn->close();
    ?>
</table>
<br>
<?php //echo "Total hours = ".$total;
$username = $_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'registration');

$query = "SELECT * FROM `totalhours` WHERE username="."'".$_SESSION['username']."'";
$result = $db->query($query);

if ($result->num_rows > 0) { $query = "UPDATE `totalhours` SET `total`="."$total"." WHERE `username`="."'".$_SESSION['username']."'";
    mysqli_query($db, $query);}
else{
$query = "INSERT INTO `totalhours` (username, total) 
  			  VALUES('$username', '$total')";
mysqli_query($db, $query);}

?>

<div class="input-group">
    <a href="hour.php" class="btn">Add Attendance</a>
</div>
</body>
</html>