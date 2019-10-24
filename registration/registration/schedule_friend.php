<!DOCTYPE html>
<html>

<head>
    <title>My Schedule</title>
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
        body{background:white;}
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

<div class="input-group">
    <a href="schedule_submit.php" class="btn">Add Shift</a>
    <a href="remove_shifts.php" class="btn">Remove All Shifts</a>
</div>

<br style="line-height: 10px" />

<?php
$movies = array(
    array('8:30 - 9:00' , '' , '', '', '', '' ),
    array('9:00 - 9:30' , '' , '', '', '', '' ),
    array('9:30 - 10:00' , '' , '', '', '', '' ),
    array('10:00 - 10:30' , '' , '', '', '', '' ),
    array('10:30 - 11:00' , '' , '', '', '', '' ),
    array('11:00 - 11:30' , '' , '', '', '', '' ),
    array('11:30 - 12:00' , '' , '', '', '', '' ),
    array('12:00 - 12:30' , '' , '', '', '', '' ),
    array('12:30 - 1:00' , '' , '', '', '', '' ),
    array('1:00 - 1:30' , '' , '', '', '', '' ),
    array('1:30 - 2:00' , '' , '', '', '', '' ),
    array('2:00 - 2:30' , '' , '', '', '', '' ),
    array('2:30 - 3:00' , '' , '', '', '', '' ),
    array('3:00 - 3:30' , '' , '', '', '', '' ),
    array('3:30 - 4:00' , '' , '', '', '', '' ),
    array('4:00 - 4:30' , '' , '', '', '', '' ),
    array('4:30 - 5:00' , '' , '', '', '', '' ),
);

session_start();
$conn = mysqli_connect("localhost", "root", "", "registration");
$sql = "SELECT DISTINCT a.row1, a.column1, a.username, b.firstname, b.lastname FROM schedule AS a, users AS b WHERE b.username="."'".$_SESSION['username']."'"." AND a.username=b.username";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    $movies[$row["row1"]][$row["column1"]] = $row["firstname"]." ".$row["lastname"]." ".$movies[$row["row1"]][$row["column1"]];
}

echo '<table border="1">';
echo '<col width="100px" />';
echo '<col width="200px" />';
echo '<col width="200px" />';
echo '<col width="200px" />';
echo '<col width="200px" />';
echo '<col width="200px" />';
echo '<tr><th></th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th></tr>';
foreach( $movies as $movie )
{
    echo '<tr>';
    foreach( $movie as $key )
    {
        echo '<td>'.$key.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>

</body>
</html>