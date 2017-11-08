<?php
	include_once 'dbconfig.php';
	include 'sessionValue.php';
	if(isset($_POST['user']) &&  isset($_POST['pass']) &&  isset($_POST['mail']) && isset($_POST['account']))
	{
	$un =  $_POST['user'];
	$ps =  $_POST['pass'];
	$ml = $_POST['mail'];
	$userType = $_POST['account'];
//	echo $userType;
		//if ($_POST["pass"] == $_POST["confirm_password"]) {
		  // echo "<p>password matched</p>";
	//	}
	//	else {
		   // failed frown emoticon
	//		echo "password not matched";
	//	}
	if(!empty($un) && !empty($ps) && !empty($ml) && !empty($userType))
	{
					
		if ($_POST["pass"] == $_POST["confirm_password"]) {
		   		$sql_query= "SELECT * from   login where username = '$un';";
				$q_run = mysql_query($sql_query);	
             $ro =mysql_num_rows($q_run);
						if($ro<1)
					{
						$sql_query= "INSERT INTO  login(username ,email, password,usertype)   values ('$un'  , '$ml' , '$ps','$userType') ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
						 mysql_query($sql_query);	
			          // echo $ro."vuaa";
						 if($userType!="3")
			           	header("Location: LogIn.php");  
						else
						{
							$_SESSION['starname'] = $un;
							header("Location: addcast.php");
						

						}  
							
					}
					else
					{
						?>
						<script type="text/javascript">
								alert("Username Already Taken! frown emoticon");
						</script>
						<?php
						//echo "baal";
							   		//header("Location: Register.php");  
					
					}
		}
		else {
			?>
			<script type="text/javascript">
					alert("Please type same password!");
			</script>
			<?php
				   	//	header("Location: Register.php");  
		
		}
			// $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
		 		
			 //header("Location: LogIn.php");
	}
	
	
	 
	}
	// delete condition
?>
<html>
    <head>
        <title>Register Page</title>
		<link rel="stylesheet" type="text/css" href="css/styleReg.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>       
   <div class="testbox">
  <h1>Registration</h1>
  <form action="" method="POST" >
      <hr>
    <div class="accounttype" >
      <input type="radio" value="1" id="radioOne" name="account" checked/>
      <label for="radioOne" class="radio" checked>Personal</label>
      <input type="radio" value="2" id="radioTwo" name="account" />
      <label for="radioTwo" class="radio">VIP User</label>
      <input type="radio" value="3" id="radioThree" name="account" />
      <label for="radioThree" class="radio">Celebrity User</label>
      
    </div>
  <hr>
  <label id="icon" > <i class="fa fa-envelope-o"></i> </label> 
  
  <input type="text" name="mail" id="name" placeholder="Email" required/>
  
  <label id="icon" for="name"> <i class="fa fa-user"></i> </label>
  <input type="text" name="user" id="name" placeholder="Name" required/>
  <label id="icon" for="name"> <i class="fa fa-shield"></i> </label>
  <input type="password" name="pass" class="passwrd" id="name" placeholder="Password" required/>
  <label id="icon" for="name"> <i class="fa fa-shield"></i> </label>
  <input type="password" name="confirm_password" class="cnfrmPass" id="name" placeholder="Confirm Password" required/>
   <input type="submit" value = "Register">
 
  </form>
</div>
    </body>
</html>