<?php

session_start();

$error="";
	if (isset($_POST['submit'])) {
		if (empty($_POST['user']) || empty($_POST['pass'])) {
			$error ="Username and Password is invalid";
		}
		else
		{
			$user=$_POST['user'];
			$pass=$_POST['pass'];

			$conn=mysqli_connect("localhost","root","");
			$db=mysqli_select_db($conn,"staff");
			$query=mysqli_query($conn, "SELECT * FROM admin WHERE password='$pass' AND username='$user'");

			$rows=mysqli_num_rows($query);
			if ($rows == 1) {
				header("Location:admin.php");
			}
			else
			{
				echo "<script>alert('Username and Password is invalid'); window.location='index.php'</script>";
			}
			mysqli_close($conn);
		}
	}
?>