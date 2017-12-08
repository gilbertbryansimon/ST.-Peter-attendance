<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="icon" type="icon" href="img/images3.jpg">
<link rel="stylesheet" type="text/css" href="style.css">
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
		if(isset($_POST['re_username']))
		{
		$old_user=$_POST['old_user'];
		$new_user=$_POST['new_user'];
		$re_user=$_POST['re_user'];
		$chg_pwd=mysqli_query($conn_db,"SELECT * from admin where id='1'");
		$chg_pwd1=mysqli_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['username'];
		if($data_pwd==$old_user){
		if($new_user==$re_user){
			$update_pwd=mysqli_query($conn_db,"UPDATE admin set username='$new_user' where id='1'");
			echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype username is not match'); window.location='index.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old username is wrong'); window.location='index.php'</script>";
		}}
	?>
 	
 	<div id="frm">
 		<img src="img/images3.jpg">
	<form method="post">
		<h2 style="text-align:center;">Change Username</h2>
		<p>
		<input type="text" name="old_user" placeholder="Old Username..."  autocomplete="off" autofocus required />
		</p>
		<p>
		<input type="text" name="new_user" placeholder="New Username..."   autocomplete="off" required />
		</p>
		<p>
		<input type="text" name="re_user" placeholder="Retype New Username..." autocomplete="off" required />
		</p>
		<p>
			<input type="submit" id="btn" value="Reset Username" name="re_username" />
		</p>
	</form>
</div>
</body>
</html>