<?php
	include 's5.php';
	include_once 'dbconfig.php';
    require 'sessionValue.php';
    //var_dump($_SESSION);
  	$keyword = $_SESSION['search'];
	$sql_query = "Select Movie_Name  from Movie_Details";
	$query_run =  mysql_query($sql_query);
	$row = mysql_num_rows($query_run);
	//$movie  = array();

	$movie_partial  = array();

	$in =0;
	$numbers = array("one","two", "three");

	include 'index.php';
	

	$in2 =0;
	for($i = 0; $i<$row ; $i = $i+1 )
	 {
	 	$movi= mysql_result($query_run,$i, 'Movie_Name');
	 //	$img= mysql_result($query_run,$i, 'Image_Link');
	 	if(find_levenshtein_distance(get_pursed_string($keyword),get_pursed_string($movi)    ) <4  )
	 	{
	 		$movie_partial[$in2] =  $movi;
	 		//$image_partial[$in2] = $img;
	 		$in2 = $in2 +1;


	 	}
	 	
	 	//$Role[$i] = mysql_result($query_run, $i , 'RolePlay');	
	 	//echo $Actor[$i]." AS ".$Role[$i]."\n";

	} 
     
     

?> 
<html>
 <head>
    <title>Movie Page</title>
	<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleMoviePage.css" /> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	    <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 </head>
   
   <body style = "background-image: url('untitled.jpg')">
   <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-5">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>
                </div>
                  <ul class="nav navbar-nav">
                    <li ><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active"><a href="#">Movie</a></li> 
                    <li><a href="blog.php">Blog</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                  </ul>
              </div>
        </nav>
      </div>
    </div>
 
	<div class="row">
		<div class="col-md-4">		
   		</div>
   		<div class="col-md-6">
   			<strong>Partial Match:</strong>
   		</div>
	</div>


	
	
  	<?php 
		// include html div in list.php for east cast
	 	
	 	for($i = 0; $i < $in2;$i++)
		{
			//$ss= $numbers[$in2];
			movie_grid_delete($movie_partial[$i] );
			
			//$_SESSION['role']= $Role[$i];
			//if($i==0)
//			include 's4.php';
			
		}
		if($in2 ==0)
		{
			echo 	"<div class=\"row\">".
		"<div class=\"col-md-4\">".		
   		"</div>".
   		"<div class=\"col-md-6\">".
   			"<strong>No Such Movie Found. Search Again to Delete</strong>".
   		"</div>".
		"</div>";

		}

	?>

   </body>
</html>
