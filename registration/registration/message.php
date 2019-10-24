<?php include('message_submission.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
<div class="header">
    <h2>Send Message</h2>
</div>
<form method="post" action="">
    <?php include('errors.php') ?>
    <div class="input-group">
        <label>Friend</label>
        <select name="name">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "registration");
            $sql = "SELECT * FROM `users` WHERE username<>'admin'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row['username'].">".$row['firstname']." ".$row['lastname']."</option>";
            }
            ?>
        </select>
    </div>
    <div class="input-group-2">
        <label>Message</label>
        <textarea maxlength="255" rows="4" cols="50" name="message"></textarea>
    </div>
    <div class="input-group">
        <button type="submit" name="message_submission" class="btn">Submit</button>
    </div>
    <?php if (isset($_SESSION['success_message'])) : ?>
        <br style="line-height: 10px" />
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
                ?>
            </h3>
        </div>
    <?php endif ?>
</form>

</body>
</html>