<!DOCTYPE html>
<html>
<head>
  <title>Collector</title>
  <link rel="icon" type="icon" href="img/images3.jpg">
  <?php include('header.php'); ?>

  <div id="frm">
  <form method = "POST">
    <img src="img/images3.jpg">
      <h2 style="text-align:center;">Agent Attendance</h2>
       <p>
         <label><i class="fa fa-id-badge"></i> Choose ID</label><br>
        <select name="id" required="">
          <option></option>
          <?php
          $connection = mysqli_connect("localhost", "root", ""); 
          $db = mysqli_select_db($connection,"staff"); 
          $query ="SELECT id FROM add_collector ORDER by id" ;
          $results = mysqli_query($connection,$query);

          foreach ($results as $id) {
            ?>
            <option value ="<?php echo $id['id'];?>">
              <?php echo $id['id'];?>
            </option>
            <?php
          }
          mysqli_close($connection);
          ?>
        </select>
      </p>
      <p>
        <input  style="text-align:center;" type="text" name="time" readonly value=<?php date_default_timezone_set("Asia/Manila"); echo date("h:i:sA");?>>
      </p>
      <p>
        <input style="text-align:center;" type="text" name="date" value=<?php echo date("Y/m/d");?>>
      </p>
      <p>
        <button type="submit" name="timein"><i style="color:black" class="fa fa-sign-in"></i> Time In</button>
        <button type="submit" name="timeout"><i style="color:black" class="fa fa-sign-out"></i> Time Out</button> 
      </p>
    </form>
    </div>
</body>
</html>
<?php
$connection = mysqli_connect("localhost", "root", ""); 
$db = mysqli_select_db($connection,"staff");  
if(isset($_POST['timein'])){ 
$id = $_POST['id'];
$time = $_POST['time'];
$date = $_POST['date'];
$query=mysqli_query($connection,"SELECT * From collector_tb where ID='$id' and Date='$date'");
if (mysqli_num_rows($query) > 0) {
  echo "<script>alert('User already Time In'); window.location='collector.php'</script>";
}else{
$queryin = mysqli_query($connection,"INSERT INTO collector_tb(ID,STL,Name,TimeIn,Date) VALUES ((Select id from add_collector Where id = $id),(Select stl from add_collector where id = $id), (select name from add_collector where id = $id), '$time', '$date')");
header("Location:home.php");
}
}
if (isset($_POST['timeout'])) {
$id = $_POST['id'];
$time = $_POST['time'];
$date = $_POST['date'];
$queryin = mysqli_query($connection,"UPDATE collector_tb set TimeOut='$time' where ID = '$id' AND Date='$date'");
header("Location:home.php");
}
mysqli_close($connection);
?>