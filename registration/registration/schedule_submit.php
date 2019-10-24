<?php include('schedule_submit_sql.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Shift</title>
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
    <h2>Shift Adder</h2>
</div>
<form method="post" action="">
    <div class="input-group">
        <label>Day</label>
        <select name="day">
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
        </select>
    </div>
    <div class="input-group">
        <label>Start Time</label>
        <select name="start">
            <option value="0">8:30</option>
            <option value="1">9:00</option>
            <option value="2">9:30</option>
            <option value="3">10:00</option>
            <option value="4">10:30</option>
            <option value="5">11:00</option>
            <option value="6">11:30</option>
            <option value="7">12:00</option>
            <option value="8">12:30</option>
            <option value="9">1:00</option>
            <option value="10">1:30</option>
            <option value="11">2:00</option>
            <option value="12">2:30</option>
            <option value="13">3:00</option>
            <option value="14">3:30</option>
            <option value="15">4:00</option>
            <option value="16">4:30</option>
            <option value="17">5:00</option>
        </select>
    </div>
    <div class="input-group">
        <label>End Time</label>
        <select name="end">
            <option value="0">8:30</option>
            <option value="1">9:00</option>
            <option value="2">9:30</option>
            <option value="3">10:00</option>
            <option value="4">10:30</option>
            <option value="5">11:00</option>
            <option value="6">11:30</option>
            <option value="7">12:00</option>
            <option value="8">12:30</option>
            <option value="9">1:00</option>
            <option value="10">1:30</option>
            <option value="11">2:00</option>
            <option value="12">2:30</option>
            <option value="13">3:00</option>
            <option value="14">3:30</option>
            <option value="15">4:00</option>
            <option value="16">4:30</option>
            <option value="17">5:00</option>
        </select>
    </div>
    <div class="input-group">
        <button type="submit" name="schedule_submission" class="btn">Submit</button>
    </div>
    <?php if (isset($_SESSION['success_schedule'])) : ?>
        <br style="line-height: 10px" />
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success_schedule'];
                unset($_SESSION['success_schedule']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['failure_schedule'])) : ?>
        <br style="line-height: 10px" />
        <div class="error" >
            <h3>
                <?php
                echo $_SESSION['failure_schedule'];
                unset($_SESSION['failure_schedule']);
                ?>
            </h3>
        </div>
    <?php endif ?>
</form>

</body>
</html>