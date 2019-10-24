<!DOCTYPE html>
<html>

<head>
    <title>Companions Summary</title>
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
                <li><a href="index_admin.php">Home</a></li>
                <li><a href="attendance_summary.php">Friends</a></li>
                <li><a href="companion_summary.php">Companions</a></li>
                <li><a href="schedule.php">Schedule</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

<br style="line-height: 10px" />

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Institution</th>
        <th>Events</th>
        <th>Fund</th>
        <th>Edit</th>
    </tr>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "registration");
    // Check connection

    $sql = "SELECT `firstname`, `lastname`, `title`, `phone`, `institution`, `events`, `fund` FROM `companion`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"] . "</td><td>"
                . $row["title"]. "</td><td>".$row["phone"]."</td><td>".$row["institution"]."</td><td>".$row["events"]."</td><td>".$row["fund"]."</td><td><a href=remove_companion.php?firstname=".$row["firstname"]."?lastname=".$row["lastname"].">Remove</a></td></tr>";
        }
        echo "</table>";
    }
    $conn->close();
    ?>
</table>
<br>
</body>
</html>