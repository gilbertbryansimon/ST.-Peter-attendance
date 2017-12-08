<?php 
include('header2.php');?>

<br><br><br>
<center><script type="text/javascript" src="gstatic/loader.js"></script>
       <div id="piechart" style="width: 500px; height: 400px;"></div>
   
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Late',     5],
          ['Present',      10],
          ['absent',  2],
        ]);

        var options = {
          title: "Employee's Daily Attendance Performance",
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

</script></center>

</body>
</html>
