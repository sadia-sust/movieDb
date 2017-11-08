<?php
	include_once 'dbconfig.php';
	include 'sessionValue.php';
	$un = $_SESSION['username'];
	$query = "SELECT Star_Name from star_relation where username = '$un' ;";
	

	$query_run = mysql_query($query);
	$name = mysql_result($query_run,0, 'Star_Name');
	$query  = "SELECT ID from stars where Name = '$name' ;";
	echo $query;
	$query_run = mysql_query($query);
	$ID = mysql_result($query_run,0, 'ID');
	$page = "Location: actorPage2.php?ID=".$ID;
	header("$page");
		

	 

?>