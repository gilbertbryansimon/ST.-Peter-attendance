<?php
include("loginserv.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title> 
	<link rel="icon" type="icon" href="img/images3.jpg">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
</head>
<body>
	<div id="frm"><br>
		<img style = "margin-left: 35%;" src="img/images3.jpg">
		<form  action = "" method="POST">
			<h2 style="text-align:center;">My Admin</h2>
			<p>
				<input type="text" id="user" name="user" placeholder="Username" autocomplete="off" autofocus required=""><br>
			</p>
			<p>
				<input type="password" id="pass" name="pass" placeholder="Password" autocomplete="off" required=""><br>
			</p>
			<p>
				<input type="submit" id="btn" name="submit" value="Log in"><br>
			</p>
			<p class = "change" style="text-align:center;">
				<a href="changepass.php"><i class="fa fa-edit"> Change Password</i></a>
			</p>
			<p>
				<span><?php echo $error; ?></span>
			</p>
		</form>
	</div>
</body>
</html>