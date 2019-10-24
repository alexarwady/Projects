<?php include('task_submit.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add task</title>
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
    <h2>Add task</h2>
</div>
<form method="post" action="task.php">
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
        <input type="date" name="datetime" value="<?php echo $today?>">
    </div>
    <div class="input-group">
        <label>Task title</label>
        <input type="text" name="tasktitle" >
    </div>
    <div class="input-group-2">
        <label>Task description</label>
        <textarea maxlength="255" rows="4" cols="50" name="taskdescription"></textarea>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="task_submit">Submit</button>
    </div>
</form>

</body>
</html>
