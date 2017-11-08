<?php
     include_once 'dbconfig.php';
	
	
	$movie = $_SESSION['StarName'];
	$dt = date("Y/m/d");
	// $day = substr($dt, 8,10);
	// echo $day;

	$sql_query= "SELECT Visit_Time FROM visit_counter2 where Visit_Time = '$dt' and Star_Name='$movie' ";
	$query_run = mysql_query($sql_query);
	$day  = mysql_num_rows($query_run);

     $month = substr($dt, 0,8);
	// echo $day;

	$sql_query= "SELECT Visit_Time FROM visit_counter2 where Visit_Time like '$month%' and Star_Name='$movie' ";
	$query_run = mysql_query($sql_query);
	$month  = mysql_num_rows($query_run);

	$year = substr($dt, 0,4);

	$sql_query= "SELECT Visit_Time FROM visit_counter2 where Visit_Time like '$year%' and Star_Name='$movie' ";
	$query_run = mysql_query($sql_query);
	$year  = mysql_num_rows($query_run);

	

	// echo $day.' '.$month.' '.$year;

	$sql_query= "update visit_chart set percentage = $day where visit = 'This Day' ";
	 mysql_query($sql_query);

	 $sql_query= "update visit_chart set percentage = $month where visit = 'This Month' ";
	 mysql_query($sql_query);

	 $sql_query= "update visit_chart set percentage = $year where visit = 'This Year' ";
	 mysql_query($sql_query);

	 

	  //include 'line_chart.php';



?>