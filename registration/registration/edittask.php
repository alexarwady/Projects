<!DOCTYPE html>
<html>

<head>
    <title>Edit Tasks</title>
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
        <th>Username</th>
        <th>Date</th>
        <th>Task Title</th>
        <th>Task Description</th>
        <th>Edit</th>
    </tr>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "registration");
    // Check connection

    $sql = "SELECT `username`, `date1`, `title`, `description` FROM `task` WHERE username="."'".$_SESSION['username']."'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["username"]. "</td><td>" . $row["date1"] . "</td><td>"
                . $row["title"]. "</td><td>" . $row["description"] . "</td><td><a href=remove_task.php?date1=".$row["date1"]."?title=".$row["title"].">Remove</a></td></tr>";
        }
        echo "</table>";
    }
    $conn->close();
    ?>
</table>
<br>
<div class="input-group">
    <a href="task.php" class="btn">Add Task</a>
</div>

</body>
</html>