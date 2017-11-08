<?php
	include_once 'dbconfig.php';
	// /require 'sessionValue.php';
	

  if (isset($_POST["latestNews"])) 
  {

       header("Location: logout.php");
  }
  

?>
<!doctype html>
 <head>
 	<title>Admin</title>
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
    #addMovie {
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
  #addMovie:hover {
      border: none;


      box-shadow: 0px 10px 10px #228B22;
  }
  #latestNews {
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
  #latestNews:hover {
      border: none;


      box-shadow: 0px 10px 10px #228B22;
  }
   #deleteMovie {
      background-color: #3b5998;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius:6px;
      color: #fff;
      font-size: 20px;
      text-decoration: none;
      cursor: pointer;
      border:none;
  }
  #deleteMovie:hover {
      border: none;

      box-shadow: 0px 10px 10px red;
  }
   #deleteBlog {
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
  #deleteBlog:hover {
      border: none;

      box-shadow: 0px 10px 10px red;
  }
  </style>
  <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
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
    <div>
    	<h3>
    		You Can't Visit This page as a Guest User
    	</h3>
    </div>
    <div>

      <form method="post">
          <input type="submit" id="latestNews" name="latestNews" value="Log in Again"/>
      </form>
    </div>


    
    </div>
    
  </body>
</html>
