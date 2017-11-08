<?php
	include_once 'dbconfig.php';
	include 'sessionValue.php';

	if(isset($_POST['user']))
	{

	$un =  $_POST['user'];
	$pre_un = $_SESSION['username'];

	// $ps =  $_POST['pass'];
	// $ml = $_POST['mail'];
	// $userType = $_POST['account'];
	// echo $userType;

		//if ($_POST["pass"] == $_POST["confirm_password"]) {
		  // echo "<p>password matched</p>";
	//	}
	//	else {
		   // failed :(
	//		echo "password not matched";
	//	}
	if(!empty($un))
	{




			// $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];

			// $sql_query= "INSERT INTO  login(username ,email, password,usertype)   values ('$un'  , '$ml' , '$ps','$userType') ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
			 $sql_query = "Update login set username = '$un' where username = '$pre_un' ";
			 mysql_query($sql_query);	
             //header("Location: LogIn.php");

             $sql_query = "Update blog set username = '$un' where username = '$pre_un' ";
			 mysql_query($sql_query);

			 $sql_query = "Update rating set username = '$un' where username = '$pre_un' ";
			 mysql_query($sql_query);

			 $sql_query = "Update visit_counter set username = '$un' where Username = '$pre_un' ";
			 mysql_query($sql_query);
			 $_SESSION['username']= $un;
			header("Location: userprofile.php");


	}
	 
	 }

	 if(isset($_POST['pass']))
	{

	$ps =  $_POST['pass'];
	$pre_un = $_SESSION['username'];

	// $ps =  $_POST['pass'];
	// $ml = $_POST['mail'];
	// $userType = $_POST['account'];
	// echo $userType;

		//if ($_POST["pass"] == $_POST["confirm_password"]) {
		  // echo "<p>password matched</p>";
	//	}
	//	else {
		   // failed :(
	//		echo "password not matched";
	//	}
	if(!empty($ps))
	{




			// $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];

			// $sql_query= "INSERT INTO  login(username ,email, password,usertype)   values ('$un'  , '$ml' , '$ps','$userType') ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
			 $sql_query = "Update login set password = '$ps' where username = '$pre_un' ";
			 mysql_query($sql_query);	
             //header("Location: LogIn.php");




	}
	 
	 }
?>
<html>
    <head>

        <title>User Profile</title>
        <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<style type="text/css">
  .container { 
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: flex-start;
    width: 800px;
    height: 400px;

    margin: 0 auto;
  }
  </style>
    </head>
 <body style="background-color: #444444; background-image: url('untitled.jpg');">
  	<div class="container">
       <div >
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
      </div>
       <div class="testbox">
  <h2>Change Username or Password</h2>

  <form action="" method="POST" >
    
  
<!--   <label id="icon" > <i class="fa fa-envelope-o"></i> </label> 
  
  <input type="text" name="mail" id="name" placeholder="Email" required/> -->
  
  <label id="icon" for="name"> <i class="fa fa-user"></i> </label>
  <input type="text" name="user" id="name" placeholder="User Name" />

  <label id="icon" for="name"> <i class="fa fa-shield"></i> </label>
  <input type="password" name="pass" class="passwrd" id="name" placeholder="Password" /> 
    <input type="submit" value = "Submit">
  </form>
</div>
</div>

    </body>
</html>