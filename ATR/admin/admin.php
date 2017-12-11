<?php 
include('header2.php');?>

<?php
$con = mysqli_connect("localhost", "root", "","staff");

$count=mysqli_query($con,"INSERT INTO performance(Rate) VALUES (SELECT Status,count(*) from staff_tb where Status ='Present' Group by Status) where Status='Present'");
$query=mysqli_query($con,"SELECT * from performance");
$res=$query;

?>

<br><br><br>
<center><script type="text/javascript" src="gstatic/loader.js"></script>
       <div id="piechart" style="width: 500px; height: 400px;"></div>
   
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Rate'],

          <?php 
          while ($row=$res->fetch_assoc()) 
          {
            echo "['".$row['Status']."',".$row['Rate']."],";
          }

          ?>
          
        ]);

        var options = {
          title: "Employee's Daily Attendance Performance",
          is3D:true,
          colors: ['green','blue','orange'],
          'backgroundColor': 'mediumseagreen',

          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

</script></center>

</body>
</html>
