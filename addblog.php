<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';

    $dt = date("Y/m/d");

	if(isset($_POST['title']) &&  isset($_POST['description']) )
	{

	$name =    $_POST['title'];
	$des =    $_POST['description'];
	$un = $_SESSION['username'];
	if(!empty($name) && !empty($des))// && !empty($description) && !empty($releaseDate) && !empty($url))
	{




	
			 $sql_query= "INSERT INTO blog ( Title, username, Description, Uploaded_Time) VALUES ( '$name', '$un' , '$des', '$dt');";
			 mysql_query($sql_query);
             header("Location: blog.php");




	}
	
	 
	}
	// delete condition
?>

<head>
  <title>Blog</title>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    width: 800px;

    margin: 0 auto;
  }
  <style type="text/css">
  .container { 
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: space-between;
    width: 800px;
    height: 400px;

    margin: 0 auto;
  }
  #sub {
      background-color: #3b5998;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius:6px;
      color: #fff;
      font-size: 20px;
      width: 160px;
      text-decoration: none;
      cursor: pointer;
      border:none;
  }
    #sub {
      background-color: #3b5998;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius:6px;
      color: #fff;
      font-size: 20px;
      width: 160px;
      text-decoration: none;
      cursor: pointer;
      border:none;
  }
  #sub:hover {
      border: none;
      box-shadow: 0px 10px 10px #228B22;
  }
   
  </style>
  <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    
</head>

<body style="background-color: #444444; background-image: url('untitled.jpg');">
  	<div class="container">
  	<div>
       <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li ><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
    </div>
    <div style= "width: 100px;">
	  	  	<form method="post">
        
        <!-- <input type="text" name="mail" id="name" placeholder="Email" required/> -->

        <input type="text" style="border-radius:6px;"name="title" placeholder="Blog Title" required/>
        <textarea type="text" style="width:400px;height:400px;border-radius:6px;" name="description"  placeholder="Description" required></textarea>
        <input type="submit" id="sub" name="sub" style="padding-up: 10px" value="ADD this Blog!">


  	</form>
	</div>

  	
  
  </body>

</html>
