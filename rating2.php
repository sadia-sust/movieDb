<?php
	include_once 'dbconfig.php';
	//require 'sessionValue.php';

	$un = $_SESSION['username'] ;
	$mname= $_SESSION['StarName'];
	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$mname' and username = '$un' ";
	$query_run = mysql_query($sql_query);
	$row  = mysql_num_rows($query_run);
	if($row !=0)
	$rate = mysql_result($query_run,0, 'rating');
	else
	$rate = "Not Rated Yet!";
	$sql_query= "SELECT rating FROM star_rating where Star_Name = '$mname' ";
	$query_run = mysql_query($sql_query);
	$row  = mysql_num_rows($query_run);
	$rating_avg =0;

	$page = "Location: actorPage.php?ID=".$_SESSION['A_ID'];
			
	for($i =0; $i <$row; $i = $i +1)
	{

		$rating_avg = $rating_avg + mysql_result($query_run, $i , 'rating');
	
	}
	if($row !=0)
	$rating_avg = $rating_avg / $row;
	else
	$rating_avg = "Not Available";

	
	if (isset($_POST["myButton"]) && $_SESSION['username'] !="Guest")
	{
		if($rate != "Not Rated Yet!")
		$sql_query= "UPDATE star_rating set rating = 1 where Star_Name = '$mname' and username = '$un' ";
		else
		$sql_query= "INSERT INTO star_rating VALUES ('$un' , '$mname' ,  1)";

		$query_run = mysql_query($sql_query);
		$row  = mysql_num_rows($query_run);
		$rate = mysql_result($query_run,0, 'rating');
   		header("$page");	

	}
	if (isset($_POST["myButton2"])  && $_SESSION['username'] !="Guest") 
	{
	    		if($rate != "Not Rated Yet!")
		$sql_query= "UPDATE star_rating set rating = 2 where Star_Name = '$mname' and username = '$un' ";
		else
		$sql_query= "INSERT INTO star_rating VALUES ('$un' , '$mname' ,  2)";


		$query_run = mysql_query($sql_query);
		$row  = mysql_num_rows($query_run);
		$rate = mysql_result($query_run,0, 'rating');
   		header("$page");
	     
	}
	if (isset($_POST["myButton3"])  && $_SESSION['username'] !="Guest")
	{
				if($rate != "Not Rated Yet!")
		$sql_query= "UPDATE star_rating set rating = 3 where Star_Name = '$mname' and username = '$un' ";
		else
		$sql_query= "INSERT INTO star_rating VALUES ('$un' , '$mname' ,  3)";


		
		$query_run = mysql_query($sql_query);
		$row  = mysql_num_rows($query_run);
		$rate = mysql_result($query_run,0, 'rating');
   		header("$page");

	}
	if (isset($_POST["myButton4"])  && $_SESSION['username'] !="Guest")
	{
	    		if($rate != "Not Rated Yet!")
		$sql_query= "UPDATE star_rating set rating = 4 where Star_Name = '$mname' and username = '$un' ";
		else
		$sql_query= "INSERT INTO star_rating VALUES ('$un' , '$mname' ,  4)";
		$query_run = mysql_query($sql_query);
		$row  = mysql_num_rows($query_run);
		$rate = mysql_result($query_run,0, 'rating');
   		header("$page");
	     
	}
	if (isset($_POST["myButton5"])  && $_SESSION['username'] !="Guest")
	{
				if($rate != "Not Rated Yet!")
		$sql_query= "UPDATE star_rating set rating = 5 where Star_Name = '$mname' and username = '$un' ";
		else
		$sql_query= "INSERT INTO star_rating VALUES ('$un' , '$mname' ,  5)";

		$query_run = mysql_query($sql_query);
		$row  = mysql_num_rows($query_run);
		$rate = mysql_result($query_run,0, 'rating');
   		header("$page");

	}
	

?>
