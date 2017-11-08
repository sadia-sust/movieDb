<?php
     include_once 'dbconfig.php';
	
	
	$star = $_SESSION['StarName'];
     //$star = "brad Pitt";//$_SESSION['StarName'];
	$dt = date("Y/m/d");
	// $day = substr($dt, 8,10);
	// echo $day;
	$sql_query= "TRUNCATE TABLE movie_chart";
	$query_run = mysql_query($sql_query);
	$sql_query= "SELECT MovieName FROM cast where ActorNAme = '$star' ";
	$query_run = mysql_query($sql_query);

	$row = mysql_num_rows($query_run);
	for($i =0 ;$i <$row; $i++)
	{
		$movie = mysql_result($query_run,$i,'MovieName');
		$sql_query2= "SELECT Visit_Time FROM visit_counter where  Movie_Name='$movie' ";
		$query_run2 = mysql_query($sql_query2);
		$ct  = mysql_num_rows($query_run2);
		$sql_query2= "INSERT  INTO movie_chart values( '$movie' , $ct ) ";
		$query_run2 = mysql_query($sql_query2);
		echo $sql_query2."   ";
	

	}


	 

	  //include 'line_chart.php';



?>