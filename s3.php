<?php
	//$sql_query = "Select name from Movie";
	//$query_run =  mysql_query($sql_query);
	//$row = mysql_num_rows($query_run);
	//$movie = array();
	//for($i = 0; $i<$row ; $i = $i+1 )
	// {
	 //	$movie[$i] = mysql_result($query_run,$i, 'name');
	 	//$Role[$i] = mysql_result($query_run, $i , 'RolePlay');	
	 	//echo $Actor[$i]." AS ".$Role[$i]."\n";

	//}
	$numbers = array("one","two", "three");
 	
	$ss = $numbers[2];
			
	if (isset($_POST["myButton3"]))
	{
		///for($i = 0; $i < $row;$i++)
		{
				
			if((isset($_SESSION[$ss]) && !empty($_SESSION[$ss]) )) 
			{
				$_SESSION['test'] = $_SESSION[$ss];
				header("Location: test.php");
				die();
			}

		}


	}

?>
<html>

	<body>
		<form action="" method="post">
			<input type="submit" name="myButton3" value="<?php echo $_SESSION[$ss]?>"/>
		</form>
	</body>

</html>
