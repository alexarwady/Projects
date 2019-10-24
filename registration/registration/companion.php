<?php include('companion_submission.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Companion registration</title>
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
		<h2>Add Companion</h2>
	</div>

	<form method="post" action="companion.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="firstname">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lastname">
        </div>
        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title">
        </div>
		 <div class="input-group">
		 	<label>Phone Number</label>
		 	<input type="text" name="phone">
		 </div>
		 <div class="input-group">
		 	<label>Institution</label>
		 	<input type="text" name="institution">
		 </div>
		 <div class="input-group">
		 	<label>Possible Events</label>
		 	<input type="text" name="events">
		 </div>
		 <div class="input-group">
		 	<label>Fundraising</label>
		 	<input type="text" name="fund">
		 </div>
		 <div class="input-group">
		 	<button type="submit" name="reg_companion" class="btn">Register Companion</button>
		 </div>
        <?php if (isset($_SESSION['success_companion'])) : ?>
            <br style="line-height: 10px" />
            <div class="error success" >
                <h3>
                    <?php
                    echo $_SESSION['success_companion'];
                    unset($_SESSION['success_companion']);
                    ?>
                </h3>
                <p> <a href="companion_summary.php" style="color: #3c763d;">Edit Companions</a> </p>
            </div>
        <?php endif ?>
	</form>
    <br>
</body>
</html>