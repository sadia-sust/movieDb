<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';

    $dt = date("Y/m/d");

	if(isset($_POST['addName']) )
	{

	$name =    $_POST['addName'];

	if(!empty($name) )
	{




			// $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];

			 header("Location: home.php");




	}
	
	 
	}
	// delete condition
?>

<head>
  <title>Forget Password</title>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 800px;

    margin: 0 auto;
  }
  </style>
  <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    
</head>

<body style="background-color: #444444; background-image: url('untitled.jpg');">
  	<div class="container">
  	<div>

    </div>
    <div style= "width: 100px;">
	  	  	<form method="post">
        
        <!-- <input type="text" name="mail" id="name" placeholder="Email" required/> -->

        <input type="text" name="addName" placeholder="Enter email or username" required/>
        <input type="submit" value="Submit">


  	</form>
	</div>

  	
  
  </body>

</html>
