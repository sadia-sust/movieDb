<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';

    $dt = date("Y-m-d");

	if(isset($_POST['addName']) &&  isset($_POST['addDirector']) &&  isset($_POST['addDescription']) && isset($_POST['addReleaseDate']) )
	{

	$name =    $_POST['addName'];
	$director =    $_POST['addDirector'];
	$description =    $_POST['addDescription'];
	$releaseDate = $_POST['addReleaseDate'];
  $url = $_POST['trailer']; ;

    $yr = substr($releaseDate  , 0 , 4);
    $img = "sss";
     
    $_SESSION['add'] = $name;

	if(!empty($name) && !empty($director) && !empty($description) && !empty($releaseDate) && !empty($url))
	{




			// $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];

			 $sql_query= "INSERT INTO  movie(Movie_Name ,year, director)   values ('$name'  , '$yr' , '$director') ";// WHERE 'username'='$un' AND 'password'='$ps'";  ;
			 mysql_query($sql_query);	
       // echo $sql_query."\n";
			 $sql_query= "INSERT INTO  movie_details(Movie_Name ,Image_Link,Description, Update_Time,Release_Date,Trailer)   values ('$name'  , '$img' , '$description','$dt','$releaseDate','$url') ";
			 mysql_query($sql_query);
        $query = "INSERT INTO m_genre (Movie_Name , Genre) values ('$name' , 'Action') ;";
                 mysql_query($query);

        //echo $sql_query."\n";
             header("Location: upload.php");




	}
	
	 
	}
	// delete condition
?>

<head>
  <title>Profile</title>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 300px;
    margin: 0 auto;
  }
  .fr{

    width:250px;
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
    <div class="fr" >
	  	  	<form method="post">
        
        <!-- <input type="text" name="mail" id="name" placeholder="Email" required/> -->

        <input type="text" name="addName" placeholder="Movie Name" style="border-radius:6px;margin-bottom: 15px;height: 30px;width: 300px ;" required/>
        <input type="text" name="addDirector"  placeholder="Director" style="border-radius:6px;margin-bottom: 15px;height: 30px;width: 300px" required/>
        <input type="text" name="addDescription"  placeholder="Description" style="border-radius:6px;margin-bottom: 15px;height: 30px;width: 300px" required/>
        <input type="text" name="trailer"  placeholder="URL : trailer" style="border-radius:6px;margin-bottom: 15px;height: 30px;width: 300px" required/>

        <input type="date" name="addReleaseDate" style = "margin-bottom: 15px;height: 30px;width: 150px" required >
       <!--  <input type="text" name="addReleaseDate"  placeholder="Release Date(yy/mm/dd)" style="border-radius:6px;" required/> -->
        <input type="submit" value="Submit and add cast and crew">


  	</form>
	</div>

  	</div>
  
  </body>

</html>
