<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';


	//var_dump($_SESSION);
	
	$Actor = array();
	$role = array();
	$Actor_id = array();
	// set variable from movie name session
	$MOVIE = $_SESSION['test'];

	//query to get image , movie details from movie details table
	$image_query= "SELECT Image_Link , Description  FROM Movie_Details where Movie_Name = '$MOVIE' ";
	$image_query_run = mysql_query($image_query);
	$im_Link = mysql_result($image_query_run,0,'Image_Link');
	$details = mysql_result($image_query_run,0,'Description');

	//query to get actor name,role play from Cast table	
	$sql_query= "SELECT ID, ActorName, RolePlay FROM Cast where MovieName = '$MOVIE'";
	$query_run = mysql_query($sql_query);
	$row = mysql_num_rows($query_run);
	for($i = 0; $i<$row ; $i = $i+1 )
	 {
	 	$Actor[$i] = mysql_result($query_run,$i, 'ActorName');
	 	$Role[$i] = mysql_result($query_run, $i , 'RolePlay');
	 	$actor_query= "SELECT ID FROM stars where name = '$Actor[$i]'";
		$query_run2 = mysql_query($actor_query);
	
	 	$Actor_id[$i] = mysql_result($query_run2, 0 , 'ID');

	 	//echo $Actor[$i]." AS ".$Role[$i]."\n";

	}
	 		
	function writelist()
	{
	echo	"<div>".
			"<p>".
				"<a href = \"actorPage.php?ID=". $_SESSION['actor_id']. "\">".$_SESSION['actor']."</a>"." As : ".$_SESSION['role']. 
			"</p>".
			"</div>";
	}

	// delete condition
?>
<head>
  <title>Movie Details</title>
  <style type="text/css">
  .container { 
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-direction: column;
    width: 800px;

    margin: 0 auto;
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
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active"><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
      </div>
     <div >
     <img src="<?php echo $im_Link?>" id = "img">
	 <h1><?php echo $_SESSION['test'] ?> </h1>
	 </div>
     

  	<Strong>Full Cast and Crew: </Strong>
	<?php
		// include html div in list.php for east cast
	 	for($i = 0; $i < $row;$i++)
		{
			$_SESSION['actor']= $Actor[$i];
			$_SESSION['actor_id']= $Actor_id[$i];
			$_SESSION['role']= $Role[$i];
			writelist();
			//include 'list.php';
		}
	?>	 
	</div>
   </body>
</html>
