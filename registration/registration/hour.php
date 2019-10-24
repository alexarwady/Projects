<?php include('attendance.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Attendance</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
<div class="header">
    <h2>Attendance</h2>
</div>
<form method="post" action="">
    <?php include('errors.php'); ?>
    <?php
    date_default_timezone_set('Asia/Beirut');
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
    $today_time = date("H:i");
    ?>
    <div class="input-group">
        <label>Date</label>
        <input type="date" name="datetime" value="<?php echo $today; ?>" readonly>
    </div>
    <div class="input-group">
        <label>Start Time</label>
        <input type="time" name="starttime" value="<?php echo $today_time; ?>" readonly>
    </div>
    <div class="input-group">
        <button type="submit" name="attendance_submission" class="btn">Submit</button>
    </div>
    <?php if (isset($_SESSION['success_hour'])) : ?>
        <br style="line-height: 10px" />
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success_hour'];
                unset($_SESSION['success_hour']);
                ?>
            </h3>
            <h3><?php echo "Total hours = ".abs($total)?></h3>
            <p> <a href="edithours.php" style="color: #3c763d;">Edit Attendances</a> </p>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['success_starttime'])) : ?>
        <br style="line-height: 10px" />
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success_starttime'];
                unset($_SESSION['success_starttime']);
                ?>
            </h3>
            <p> <a href="edithours.php" style="color: #3c763d;">Edit Attendances</a> </p>
        </div>
    <?php endif ?>
</form>

</body>
</html>
