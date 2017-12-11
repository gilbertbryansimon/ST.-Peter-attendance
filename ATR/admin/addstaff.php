<!DOCTYPE html>
<html>
<head>
  <title>Add STAFF</title>
  <link rel="icon" type="icon" href="img/images3.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href=".../css/bootstrap.min.css">
  <style>
  p input {
    text-align: center;
  }
  input {
    text-align: center;
  }
  </style>
</head>
   <nav>
    <ul>
       <li><a href="admin.php"><i class="fa fa-user"> My Admin</i></a></li>
        <li><a href="staff_records.php"><i class="fa fa-table"> Attendance Records</i></a></li>
      <li><a href="allstaff.php"><i class="fa fa-table"> My Employee</i></a></li>
   </ul>
</nav><br><br>


  <div id="frm">
  <form method = "POST">
    <img style = "margin-left: 35%;" src="img/images3.jpg">
     <center><h2 style="text-align:center;">Add Employee</h2>
      <p>
        <input type="integer" name="id" required autocomplete placeholder="Enter id code...">
      </p>
       <p>
        <input type="text" name="fname" required autocomplete  placeholder="First Name...">
      </p>
      <p>
        <input type="text" name="lname" required autocomplete  placeholder="Last Name...">
      </p>
       <select name="position" required>
          <option>Choose Position</option>
          <option>Branch Manager</option>
          <option>Cashier</option>
          <option>Encoder</option>
          <option>Supervisor Team Leader</option>
          <option>Collector</option>
        </select>
      <p>
        <label>Start Time:</label>
        <input type="time" name="timein">
        <label>End Time:</label>
        <input type="time" name="timeout">
      </p>
      <p>
        <input type="submit" name="submit" value="ADD">
      </p></center>
    </form>
    </div>
</body>
</html>
<?php
$connection = mysqli_connect("localhost", "root", "");  
$db = mysqli_select_db($connection,"staff"); 
if(isset($_POST['submit'])){ 
$id = $_POST['id']; 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$in = $_POST['timein'];
$out = $_POST['timeout'];
$pos = $_POST['position'];

$query=mysqli_query($connection,"SELECT * From add_staff where id='$id'");
if (mysqli_num_rows($query) > 0) {
  echo "<script>alert('Data already Existed'); window.location='addstaff.php'</script>";
}else{
$queryin = mysqli_query($connection,"INSERT INTO add_staff(id, fname, lname, timein, timeout, position)
        values ('$id', '$fname', '$lname', '$in', '$out', '$pos')");
header("Location:addstaff.php");
}
}
mysqli_close($connection);
?>