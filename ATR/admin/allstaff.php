<?php
      
      $connection = mysqli_connect("localhost", "root", "","staff"); 
      $result=mysqli_query($connection,"SELECT * FROM  add_staff");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

#customers th  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
i {
  color: white;
}
.modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  input {
    text-align: center;
  }
</style>
 
  <title>Staff</title>
  <link rel="icon" type="icon" href="img/images3.jpg">
</head>
<body>
  <nav>
    <ul>
      <li><a href="Admin.php"><i class="fa fa-user"> My Admin</i></a></li></li>
      <li><a href="staff_records.php"><i class="fa fa-table"> Attendance Records</i></a></li>
      <li><a href="addstaff.php"><i class="fa fa-user-plus"> Add Employee</i></a></li>
      <li style="float:right;"><button onclick="printContent('printableArea')"><i class="fa fa-print" style="color:gray;"></i> </button> </li>
      <li style="float:right;"><i class="fa fa-search"></i> <input  id="myInput" type="text" placeholder="Search.."></li>
   </ul>
</nav><br><br><br><br><br><br>

<br><br><br><div class="container">  

  

  <form method="GET">
  </table>
    <div id="printableArea"><center><div class="container"><table id="customers" class="table table-bordered table-striped">
      <center><h4>MY STAFF</h4></center>
    <thead>
      <tr>
          <th>ID Serial Code</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Postion</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
       <?php 
        $result=mysqli_query($connection,"SELECT * FROM  add_staff");
       while ($row = mysqli_fetch_array($result)):?>
        <tr id="<?php echo $row['id'];?>">
          <td data-target="id"><?php echo $row['id'];?></td>
          <td data-target="fname"><?php echo $row['fname'];?></td>
          <td data-target="lname"><?php echo $row['lname'];?></td>
          <td data-target="timein"><?php echo $row['timein'];?></td>
          <td data-target="timeout"><?php echo $row['timeout'];?></td>
          <td data-target="position"><?php echo $row['position'];?></td>
          <td>
            <button type="button"  data-role="view" data-target="#myModal" data-id="<?php echo $row['id'];?>"><i style="color:black" class="fa fa-eye"></i> </button>
            <button type="submit" name="myDelete" value="<?php echo $row['id']; ?>"><i style="color:black" class="fa fa-trash"></i> </button>
          </td> 
        </tr>
        <?php endwhile;?>
    </tbody>
  </table></div></center></div></form> 
   
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><i class="fa fa-eye"></i> Staff Info</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <center><form method="POST" role="form">
            <div class="form-group">
              <p>
        <label><i style="color:black" class="fa fa-id-badge"></i> ID </label><br>
        <input type="integer" id="id" required readonly>
      </p>
       <p>
         <label><i style="color:black" class="fa fa-user"></i> First Name </label><br>
        <input type="text" id="fname"  required readonly>
      </p>
      <p>
         <label><i style="color:black" class="fa fa-user"></i> Last Name </label><br>
        <input type="text" id="lname"  required readonly>
      </p>
       <p>
         <label><i style="color:black" class="fa fa-hourglass"></i> Start Time </label><br>
       <input type="text" id="timein" readonly>
      </p>
      <p>
         <label><i style="color:black" class="fa fa-hourglass"></i> End Time </label><br>
       <input type="text" id="timeout" readonly>
      </p>
      <p>
         <label><i style="color:black" class="fa fa-briefcase"></i> Position </label><br>
       <input type="text"  id="position" required readonly>
      </p>
      </center>
          </form>
        </div>
      </div>
    </div>
  </div> 

  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

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

<!--for view-->
<script>
$(document).ready(function(){
  $(document).on('click','button[data-role=view]',function(){
    var id =  $(this).data('id');
    var id =  $('#'+id).children('td[data-target=id]').text();
    var fname =  $('#'+id).children('td[data-target=fname]').text();
    var lname =  $('#'+id).children('td[data-target=lname]').text();
    var timein =  $('#'+id).children('td[data-target=timein]').text();
    var timeout =  $('#'+id).children('td[data-target=timeout]').text();
    var position =  $('#'+id).children('td[data-target=position]').text();

      $('#id').val(id);
      $('#fname').val(fname);
      $('#lname').val(lname);
      $('#timein').val(timein);
      $('#timeout').val(timeout);
      $('#position').val(position);
      $('#myModal').modal('toggle');

  });
});
</script>
</html>
<?php
if(isset($_GET['myDelete'])) {
    $book_id = $_GET['myDelete']; // get the variable id
    $stmt = $connection->prepare('DELETE FROM add_staff WHERE id = ?');
    $stmt->bind_param('i', $book_id);
    $stmt->execute();
}
?>
