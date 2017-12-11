<?php
      
      $connection = mysqli_connect("localhost", "root", "","staff"); 
      $result=mysqli_query($connection,"SELECT * FROM  staff_tb ORDER BY Date");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script>
function printContent(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style>
table{
  background-color: white;
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
i {
  color: white;
}
label{
  color: white;
}
h4 {
  background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
}
</style>
  <title>Staff's Attendance Record</title>
  <link rel="icon" type="icon" href="img/images3.jpg">
</head>
<body>
  <nav>
    <ul>
      <li><a href="Admin.php"><i class="fa fa-user"> My Admin</i></a></li>
      <li><a href="allstaff.php"><i class="fa fa-table"> My Employee</i></a></li>
      <li><a href="addstaff.php"><i class="fa fa-user-plus"> Add Employee</i></a></li>
      <li style="float:right;"><button onclick="printContent('printableArea')"><i class="fa fa-print" style="color:gray;"></i> </button> </li>
      <li style="float:right;"><i class="fa fa-search"></i> <input id="myInput" type="text" placeholder="Search.."></li>
   </ul>
</nav><br><br><br><br><br><br>
<!-- <center><form action="eerevuiew.php" method="POST">
<label for="from">From:</label> 
<input type="date" id="datepicker" name="fromDate"/> 
<label for="to">to:</label> 
<input type="date" id="datepicker2" name="toDate"/> 
<input name="submit" type="submit" value="ok" /> 
</form></center>

<?php
$connection = mysqli_connect("localhost", "root", "");  
$db = mysqli_select_db($connection,"staff"); 
if(isset($_POST['submit'])){ 
$min = $_POST['fromDate'];
$max = $_POST['toDate'];

$sql="SELECT * FROM staff_tb WHERE Date BETWEEN '".$min."' AND '".$max."'";
$result = mysqli_query($connection,$sql);
header("Location:staff_records.php");
}
?>  -->
<div class="container">  
   
  </table>
    <div id="printableArea"><center><div class="container"><table id="customers" class="table table-bordered table-striped">
    <thead>
      <tr>
          <th>ID</th>
          <th>Postion</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Time In</th>
          <th>Time Out</th>
          <th>Date</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody id="myTable">
       <?php while ($row = mysqli_fetch_array($result)):?>
        <tr>
          <td><?php echo $row['ID'];?></td>
          <td><?php echo $row['Position'];?></td>
          <td><?php echo $row['Firstname'];?></td>
          <td><?php echo $row['Lastname'];?></td>
          <td><?php echo $row['TimeIn'];?></td>
          <td><?php echo $row['TimeOut'];?></td>
          <td><?php echo $row['Date'];?></td>
          <td><?php echo $row['Status'];?></td>
        </tr>
        <?php endwhile;?>
    </tbody>
  </table></div></center></div>
   

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>