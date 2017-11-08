<?php
	include_once 'dbconfig.php';
	//require 'sessionValue.php';
	//var_dump($_SESSION);
	$MOVIE = $_SESSION['StarName'];
	$un = $_SESSION['username'];
	$dt = date("Y/m/d");

	$sql_query= "SELECT ID FROM Visit_Counter2 where Star_Name = '$MOVIE' and username = '$un' and Visit_Time = '$dt' ";
	$query_run = mysql_query($sql_query);
	$row = mysql_num_rows($query_run);
	//echo $row."baler row";
	if($row == 0)
	{

		$sql_query = "INSERT into visit_counter2 (Star_Name , Visit_Time , username ) Values ('$MOVIE', '$dt' , '$un') ";
		
		echo $sql_query;
		$query_run = mysql_query($sql_query); 
		//header("Location: home.php");
	}	

?>
