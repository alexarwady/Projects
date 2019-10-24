<?php 
  session_start(); 

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
    	<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
        <br style="line-height: 10px" />
    <?php endif ?>

    <div class="input-group">
        <a href="schedule_submit.php" class="btn">Add Shift</a>
        <a href="remove_shifts.php" class="btn">Remove All Shifts</a>
    </div>
    <br style="line-height: 10px" />
    <div class="input-group">
        <a href="hour.php" class="btn">Add Attendance</a>
    </div>
    <br style="line-height: 10px" />
    <div class="input-group">
        <a href="task.php" class="btn">Add Task</a>
    </div>
</div>
<br style="line-height: 10px" />
<form method="post" action="index_admin.php">
    <div class="input-group-2">
        <label>Announcement:</label>
    </div>
<div class="input-group">
<p style="font-family: 'Work Sans', sans-serif">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "registration");
    $sql = "SELECT `announcement` FROM `announcement` WHERE `id` = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    echo $row["announcement"];}
    else {echo "No announcement";}
    ?>
</p>
</div>
</form>

<br style="line-height: 10px" />
<form method="post" action="index_admin.php">
    <div class="input-group-2">
        <label>Message from admin:</label>
    </div>
    <div class="input-group">
        <p style="font-family: 'Work Sans', sans-serif">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "registration");
        $sql = "SELECT `comment_text` FROM `comments` WHERE `username` ='".$_SESSION['username']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["comment_text"];}
        else {echo "No message form admin";}
        ?>
        </p>
    </div>
</form>
<br><br>
</body>
</html>