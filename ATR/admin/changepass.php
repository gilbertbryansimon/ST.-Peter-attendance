<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="icon" type="icon" href="img/images3.jpg">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
</head>
<style>
#frm img{
	width: 120px;
	height: 120px;
	border-radius: 60%;
	margin-top: -150px;
	margin-bottom:  20px;
	margin-left: 35%;
}
</style>
<body>
	<?php 
		$conn_db = mysqli_connect("localhost","root","") or die();
		$sel_db = mysqli_select_db($conn_db,"staff") or die();
		if(isset($_POST['re_password']))
		{
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
		$chg_pwd=mysqli_query($conn_db,"SELECT * from admin where id='1'");
		$chg_pwd1=mysqli_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['password'];
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd=mysqli_query($conn_db,"UPDATE admin set password='$new_pass' where id='1'");
			echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong'); window.location='index.php'</script>";
		}}
	?>
 	
 	<div id="frm">
 		<img src="img/images3.jpg">
	<form method="post">
		<h2 style="text-align:center;">Change Password</h2>
		<p>
		<input type="password" name="old_pass" placeholder="Old Password..."  autocomplete="off" autofocus required />
		</p>
		<p>
		<input type="password" name="new_pass" placeholder="New Password..."   autocomplete="off" required />
		</p>
		<p>
		<input type="password" name="re_pass" placeholder="Retype New Password..." autocomplete="off" required />
		</p>
		<p class="change">
			<input type="submit" id="btn" value="Reset Password" name="re_password" /><br><br>
			<a href="changeuser.php"><i class="fa fa-edit" style="text-align:center;"> Click here to change username</i></a>
		</p>
	</form>
</div>
</body>
</html>