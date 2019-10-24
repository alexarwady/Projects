<?php include ('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="topnav">
        <img src="Picture4.png" width="280" height="90">
    </div>

	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">
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
		 	<label>Username</label>
		 	<input type="text" name="username">
		 </div>
		 <div class="input-group">
		 	<label>Email</label>
		 	<input type="text" name="email">
		 </div>
		 <div class="input-group">
		 	<label>Password</label>
		 	<input type="password" name="password_1">
		 </div>
		 <div class="input-group">
		 	<label>Confirm Password</label>
		 	<input type="password" name="password_2">
		 </div>
		 <div class="input-group">
		 	<button type="submit" name="reg_user" class="btn">Register</button>
		 </div>
		 <p>
		 	Already a member? <a href="login.php">Sign in</a>
		 </p>
	</form>
    <br>
</body>
</html>