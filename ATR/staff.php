<!DOCTYPE html>
<html>
<head>
  <title>STAFF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="icon" href="img/images3.jpg">
  <?php include('header.php'); ?>

  <div id="frm">
  <form method = "POST">
    <img src="img/images3.jpg">
      <h2 style="text-align:center;">Employee Attendance</h2>
      <p>
        </i><input style="text-align:center;" type="password" name="id" placeholder="Enter id code">
      </p>
      <p>
        <input style="text-align:center;" readonly type="text" id="txt" name="time"/>
      </p>
      <p>
        <input style="text-align:center;" type="text" name="date" readonly value=<?php echo date("Y/m/d");?>>
      </p>
      <p>
        <button type="submit" name="timein"><i style="color:black" class="fa fa-sign-in"></i> Time In</button>
        <button type="submit" name="timeout"><i style="color:black" class="fa fa-sign-out"></i> Time Out</button>
      </p>
    </form>
    </div>
</body>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').value =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</html>

<?php
$connection = mysqli_connect("localhost", "root", ""); 
$db = mysqli_select_db($connection,"staff");  

if(isset($_POST['timein'])){ 
    $id = $_POST['id'];
    $time = $_POST['time'];
    $date = $_POST['date'];

    $staff_tb_query = mysqli_query($connection,"SELECT * From staff_tb where ID='$id' and Date='$date'");
    $add_staff_query_timein = mysqli_query($connection,"SELECT timein From add_staff where ID='$id'");

    if (mysqli_num_rows($add_staff_query_timein) == 0) {
        echo "<script>alert('Staff ID does NOT exist!'); window.location='staff.php'</script>";
    } elseif (strtotime($time) < strtotime($add_staff_query_timein)) {
      $queryin = mysqli_query($connection,"INSERT INTO staff_tb(ID,Position,Firstname,Lastname,TimeIn,Date) VALUES ((Select id from add_staff Where id = $id),(Select position from add_staff where id = $id), (select fname from add_staff where id = $id), (select lname from add_staff where id = $id), '$time', '$date')");
      echo "<script>alert('Time In Successful'); window.location='staff.php'</script>";
      header("Location:staff.php");
    } elseif (mysqli_num_rows($staff_tb_query) > 0) {
        echo "<script>alert('User already Time In'); window.location='staff.php'</script>";
    } elseif (strtotime($time) > strtotime($add_staff_query_timein)) { 
        $queryin = mysqli_query($connection,"INSERT INTO staff_tb(ID,Position,Firstname,Lastname,TimeIn,Date) VALUES ((Select id from add_staff Where id = $id),(Select position from add_staff where id = $id), (select fname from add_staff where id = $id), (select lname from add_staff where id = $id), '$time', '$date')");
        echo "<script>alert('You are late'); window.location='staff.php'</script>";

    } 
}


if (isset($_POST['timeout'])) { 
$id = $_POST['id'];
$time = $_POST['time'];
$date = $_POST['date'];
$staff_tb_query = mysqli_query($connection,"SELECT * From staff_tb where ID='$id' and Date='$date'");
    $add_staff_query_timeout = mysqli_query($connection,"SELECT timeout From add_staff where ID='$id'");

    if (mysqli_num_rows($add_staff_query_timeout) == 0) {
        echo "<script>alert('Staff ID does NOT exist!'); window.location='staff.php'</script>";
    } elseif (mysqli_num_rows($staff_tb_query) == 0) {
        echo "<script>alert('You need to time in first!'); window.location='staff.php'</script>";
    } elseif (mysqli_num_rows($staff_tb_query) and strtotime($time) < strtotime($add_staff_query_timeout)) {
        echo "<script>alert('It's not your time yet.); window.location='staff.php'</script>";
    } else {
        $queryin = mysqli_query($connection,"UPDATE staff_tb set TimeOut='$time' where ID = '$id' AND Date='$date'");
        echo "<script>alert('Time Out Successful'); window.location='staff.php'</script>";
        
    header("Location:staff.php");
    }
}
mysqli_close($connection);
?>