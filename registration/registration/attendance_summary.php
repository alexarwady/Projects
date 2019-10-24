<!DOCTYPE html>
<html>

<head>
    <title>Friends Summary</title>
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
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>

<body>

<br style="line-height: 10px" />

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Total Hours</th>
        <th></th>
    </tr>
    <?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $query = "SELECT a.username, a.firstname, a.lastname, a.email, b.total FROM users AS a, totalhours AS b WHERE a.username=b.username AND a.username<>"."'".$_SESSION['username']."' ORDER BY firstname, lastname";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"] . "</td><td>". $row["email"]. "</td><td>". $row["total"] . "</td><td><a href=show_hours_user.php?username=".$row["username"]." class=\"button\" style=\"vertical-align:middle\"><span>Details</span></a></td></tr>";
        }
        echo "</table>";
    }
    $db->close();
    ?>
</table>

<br>
<a href="export.php?export=true" class="btn" style="font-family: 'LeagueSpartan', sans-serif;">Export</a>

<br>
</body>
</html>