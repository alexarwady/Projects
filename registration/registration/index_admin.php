<?php
include('announcement_submit.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
    <h2>HOME</h2>
</div>

<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
        <p style="font-family: 'Work Sans', sans-serif;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index_admin.php?logout='1'" style="color: red;">Logout</a> </p>
        <br style="line-height: 10px" />
    <?php endif ?>

    <div class="input-group">
        <a href="companion.php" class="btn">Add Companion</a>
    </div>
    <br style="line-height: 10px" />
    <div class="input-group">
        <a href="message.php" class="btn">Send Message</a>
    </div>
    <br style="line-height: 10px" />
</div>
<br style="line-height: 10px" />
<form>
    <p> <a style="color: red;">Notifications: </a> </p>
    <br style="line-height: 10px" />
    <p style="font-family: 'Work Sans', sans-serif";>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    $query = "SELECT a.firstname, a.lastname, b.total FROM users AS a, totalhours AS b WHERE b.total >= 50 AND a.username=b.username AND a.username<>"."'".$_SESSION['username']."' ORDER BY firstname, lastname";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
            while (($row = $result->fetch_assoc())) {
                echo nl2br ( "* The volunteer " . "<strong>". $row["firstname"] . " " . $row["lastname"] ."</strong>". " has finished the required 50 hours by completing " . $row["total"] . " hours. \n");}
    }
    else
    { echo " No volunteer has completed the required 50 hours yet.";}
    $db->close();
    ?>
    </p>
</form>
<br style="line-height: 10px" />
<form method="post" action="index_admin.php">
    <?php include('errors.php'); ?>
    <?php if (isset($_SESSION['success_announcement'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success_announcement'];
                unset($_SESSION['success_announcement']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <div class="input-group-2">
        <label>Announcement:</label>
        <textarea maxlength="255" rows="4" cols="50" name="announcement"></textarea>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="announcement_submit">Submit</button>
    </div>

</form>
<br><br>

</body>
</html>