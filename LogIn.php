<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';
	if(isset($_POST['id']) &&  isset($_POST['pass'])) //check if login and password boxex are filled or not
	{
		$un =$_POST['id'];
		$ps =$_POST['pass'];
		if(!empty($un) && !empty($ps))
		{

		 $sql_query= "SELECT ID,usertype FROM login where username = '$un' AND password ='$ps' ";
		 if($query_run = mysql_query($sql_query))
		 {
		 	$q_num_rows = mysql_num_rows($query_run);
		 	if($q_num_rows==1)
		 	{
		 		$user_ID = mysql_result($query_run,0, 'ID');
		 		$user_type = mysql_result($query_run,0, 'usertype');
		 		
		 		//save username, id, and upcoming session value 
		 		$_SESSION['user_id'] = $user_ID;
		 		$_SESSION['usertype'] = $user_type;
		 		$_SESSION['username'] = $un;
		 		$_SESSION['upcoming'] = "NO";

		 		header("Location: home.php");
		 		//header("Location: home.php");

		 	}
		 	else
		 	{
		 		?>

		 		<script type="text/javascript">
		 				alert("Incorrect Username/Password combination!");
		 		</script>
		 		<?php
		 	}

		 }


	}
	
	 
	}
	// delete condition
?>
<!DOCTYPE html>
	<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
	<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
	<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Log In</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<script language="javascript">
			<!--//
			/*This Script allows people to enter by using a form that asks for a
			UserID and Password*/
						//-->
		</script>
		<div class="container">
			<section id="content">
				<form action="" method="POST">
					<h1>Online Movie Database</h1>
					<div>
						
					 <input name="id"  placeholder = "Username" type="text" >
					</div>
					<div>
						<input name="pass"  placeholder = "Password" type="password">
					</div>
					<div>
						<input type="submit" value="Log in" >
						<a href="forgetpass.php">Lost your password?</a>
						<a href="Register.php">Register</a>
					</div>
				</form><!-- form -->
				<div class="button">
					<a href="loginguest.php">Log In as a guest</a>
				</div><!-- button -->
			</section><!-- content -->
		</div><!-- container -->
	</body>
</html>