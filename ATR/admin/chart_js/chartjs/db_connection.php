<?php 
	header('Content-Type:application/json');

	define('server','localhost');
	define('user', 'root');
	define('pass', '');
	define('db', 'portal');

	$conn =mysqli_connect(server,user,pass,db);

	$query = "SELECT * FROM products";
	$results = mysqli_query($conn, $query);
	$data = array();
	foreach ($results as $row) {
		$data[]= $row;

	}


mysqli_close($conn);

print json_encode($data);




 ?>