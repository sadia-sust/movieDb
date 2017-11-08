<?php
     include_once 'dbconfig.php';
	//require 'sessionValue.php';
	
	$ST_NM = $_SESSION['StarName'];

	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$ST_NM' and rating = 5 ";
	$query_run = mysql_query($sql_query);
	$rate5  = mysql_num_rows($query_run);

	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$ST_NM' and rating = 4 ";
	$query_run = mysql_query($sql_query);
	$rate4  = mysql_num_rows($query_run);

	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$ST_NM' and rating = 3 ";
	$query_run = mysql_query($sql_query);
	$rate3  = mysql_num_rows($query_run);

	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$ST_NM' and rating = 2 ";
	$query_run = mysql_query($sql_query);
	$rate2  = mysql_num_rows($query_run);

	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$ST_NM' and rating = 1 ";
	$query_run = mysql_query($sql_query);
	$rate1  = mysql_num_rows($query_run);

	//echo $rate1.' '.$rate2.' '.$rate3.' '.$rate4.' '.$rate5;

	$sql_query= "update rating_chart set percentage = $rate5 where rating_num = '5 star' ";
	 mysql_query($sql_query);

	 $sql_query= "update rating_chart set percentage = $rate4 where rating_num = '4 star' ";
	 mysql_query($sql_query);

	 $sql_query= "update rating_chart set percentage = $rate3 where rating_num = '3 star' ";
	 mysql_query($sql_query);

	 $sql_query= "update rating_chart set percentage = $rate2 where rating_num = '2 star' ";
	 mysql_query($sql_query);

	 $sql_query= "update rating_chart set percentage = $rate1 where rating_num = '1 star' ";
	 mysql_query($sql_query);

	 //include 'pieChart.php';



?>