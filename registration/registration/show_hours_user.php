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
        tr:nth-child(even) {background-color: #f2f2f2}
        a{text-decoration: none;}
    </style>
</head>

<style>
    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #3B056F;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 18px;
        padding: 2px;
        width: 100px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
        font-family: 'Open Sans', sans-serif;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00ab';
        position: absolute;
        opacity: 0;
        top: 0;
        left: -70px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-left: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>

<header>
    <div class="container">
        <img src="Picture4.png" width="280" height="90" style="padding: 10px 10px 5px 100px;">

        <nav>
            <ul>
                <li><a href="index_admin.php">Home</a></li>
                <li><a href="attendance_summary.php">Friends</a></li>
                <li><a href="companion_summary.php">Companions</a></li>
                <li><a href="schedule.php">Schedule</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

<a href="javascript:history.back()" class="button" style="vertical-align:middle"><span>Back</span></a>
<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    $query = "SELECT username, firstname, lastname FROM users WHERE username="."'".$_GET['username']."'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $fn = $row["firstname"];
    $ln = $row["lastname"];
    ?>
<table>
    <tr>
        <th>Friend Name</th>
    </tr>
    <tr><td><?php echo $fn." ".$ln; ?></td></tr>
</table>
<br>

<table>
    <tr>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Hours</th>
    </tr>
    <?php
    $total=0;
    // Check connection
    $sql = "SELECT `date1`, `start_time`, `end_time`, `total` FROM `attendance` WHERE username="."'".$_GET['username']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["date1"]. "</td><td>" . $row["start_time"] . "</td><td>"
                . $row["end_time"]. "</td><td>".$row["total"]."</td><td>";
            $total = $total + $row["total"];
        }
        echo "<tr><td></td><td></td><td></td><td>"."Total = ".$total."</td></tr>";
        echo "</table>";
    }
    $conn->close();
    ?>
</table>
<br>
<div class="input-group btn" style="width:250px;">
    <?php
    echo "<a style='color:white;' href=remove_friend.php?username=".$_GET['username'].">Remove Friend from Schedule</a>";
    ?>
</div>
<div class="input-group btn" style="width:120px;">
    <?php
    echo "<a style='color:white;' href=delete_friend.php?username=".$_GET['username'].">Delete Friend</a>";
    ?>
</div>
</body>
</html>