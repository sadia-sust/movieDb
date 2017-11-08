<?php
	include_once 'dbconfig.php';
	require 'sessionValue.php';
	include 'Date.php';
	include 'rating.php';
	include 's5.php';
	include 'suggestion.php';
	//var_dump($_SESSION);
	


	$Actor = array();
	$role = array();
	// set variable from movie name session
	$MOVIE = $_SESSION['test'];

	//query to get image , movie details from movie details table
	$image_query= "SELECT Image_Link , Description ,Trailer  FROM Movie_Details where Movie_Name = '$MOVIE' ";
	$image_query_run = mysql_query($image_query);
	$im_Link = mysql_result($image_query_run,0,'Image_Link');
	$details = mysql_result($image_query_run,0,'Description');
	$trailer = mysql_result($image_query_run,0,'Trailer');
	
	
	// set variable to short or long description as per users choise 
	if(isset($_SESSION['details']) && $_SESSION['details'] =='YES')
	$details_short = $details;
	else
	$details_short = substr($details  , 0 , 50);


	//query to get Lead actor name,role play from Cast table	 
	$sql_query= "SELECT ActorName, RolePlay FROM Cast where MovieName = '$MOVIE' and priority < 3 ";
	$query_run = mysql_query($sql_query);
	$row = mysql_num_rows($query_run);

	//save actor name and roles is array
	for($i = 0; $i<$row ; $i = $i+1 )
	 {
	 	$Actor[$i] = mysql_result($query_run,$i, 'ActorName');
	 	$Role[$i] = mysql_result($query_run, $i , 'RolePlay');	
	 	//echo $Actor[$i]." AS ".$Role[$i]."\n";

	}

	////query to get director from movie table
	$sql_query_director= "SELECT director FROM Movie where MOvie_Name = '$MOVIE'";
	$query_director = mysql_query($sql_query_director);
	$director = mysql_result($query_director,0,'director');
	
	//check if seemore submit button clickd or not
	// if (isset($_POST["seemore"]))
	// {

	// 	$details_short = $details;
	// 	$_SESSION['details']= "YES";
	// 	header("Location: moviePage.php");
	// }
	if (isset($_GET["seemore"]))
	{
		
		if($_GET["seemore"]=="YES")
		{

			$details_short = $details;
			$_SESSION['details']= "YES";
			//header("Location: home.php");
		}
		else
		{

		$details_short = substr($details  , 0 , 50)."...";
		$_SESSION['details']= "NO";
		//header("Location: home.php");
		}

		//header("Location: moviePage.php");
	}
	  if (isset($_POST["field"]))
  {
      
      $_SESSION['search']=  $_POST['field'];
      header("Location: searchresult.php");
  
  }

	// delete condition
?>
<!doctype html>
 <head>
    <title>Movie Page</title>
	<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleMoviePage.css" /> -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap Core CSS -->
    <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	.st1 {
	    background-color: red;
	    background: url(star.jpg);
	    width: 30px; /* width of image */
	    height: 30px; /* height of image */
	    border: 0;
	}
	.st2 {
	    background: url(star.jpg);
	    width: 30px; /* width of image */
	    height: 30px; /* height of image */
	    border: 0;
	}
	.st3 {
	    background: url(star.jpg);
	    width: 30px; /* width of image */
	    height: 30px; /* height of image */
	    border: 0;
	}
	.st4 {
	    background: url(star.jpg);
	    width: 30px; /* width of image */
	    height: 30px; /* height of image */
	    border: 0;
	}
	.st5 {
	    background: url(star.jpg);
	    width: 30px; /* width of image */
	    height: 30px; /* height of image */
	    border: 0;
	}
	A.class1 {color:white;}
	A.class1:link  {text-decoration: none; color: white;}
	A.class1:visited {text-decoration: none; color: white;}
	A.class1:hover {text-decoration: underline; color: white;}
	A.class1:active {text-decoration: none; color: white;}

    </style>

    <!-- Custom CSS -->
   
 </head>
   
   
   <body class="theme-transit" style="background-color: #444444; background-image: url('untitled.jpg');">
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

                <div class="col-md-2">
                </div>
                
                <div class="col-md-3">
        			<img src="<?php echo $im_Link?>" id = "img">
		     	</div>
		     	
		     	   
		     	
		     	<div class="col-md-4">
				    <h1><?php echo $_SESSION['test'] ?> </h1>
					<h4>Director : <?php echo $director ?></h4> 
					<h4> Description:</h4>
					<p> <?php echo $details_short ?> </p>
					<form action="" method="get">
					<a href="<?php if($_SESSION['details']=="NO")  echo  "moviePage.php?seemore=YES" ; else echo  "moviePage.php?seemore=NO" ?>" >See 
					<?php if ($_SESSION['details']=="YES")  echo "less"; else  echo  "more"?>
					</a>
					</form>
		 
    			</div>
                
                
     </div>
     
     <div class="row">
     	 <div class="col-md-2">
                </div>
     <div class="col-md-4">
     	<h4>Rating : </h4>
     </div>

      <div class="col-md-4">
      Suggested Movies:
                </div>
     </div>
     <div class="row">
     <div class="col-md-2">
                </div>
		<div class="col-md-4">
		     	 

		<form action="" method="post">
		<input type="submit" class="st1" name="myButton" value="1"/>
		<input type="submit" class="st2" name="myButton2" value="2"/>
		<input type="submit" class="st3" name="myButton3" value="3"/>
		<input type="submit" class="st4" name="myButton4" value="4"/>
		<input type="submit" class="st5" name="myButton5" value="5"/>

	</form>

		</div>
		

	</div>
	<div class="row">
	     	 <div class="col-md-2">
                </div>

		<div class="col-md-3">
			<div>
	<p>
		Current Rating <?php echo $rate ?>
	</p>
	<p>
		Average Rating <?php echo $rating_avg  ?>
	</p>

	</div>
		</div>
		<?php echo movie_suggestion($suggestion1 ,$im_sug1);?>

	</div>
     <div class="row">
	     <div class="col-md-2">
	     </div>
	     <div class="col-md-3">
	 		<Strong>Cast : </Strong>
	 <p><?php echo $Actor[0]." AS ".$Role[0] ?> </p>
	 <p><?php echo $Actor[1]." AS ".$Role[1] ?> </p>
	 <a href="movieDetails.php">See full cast and crew!</a>
	 <div><a href="review.php">See or write a Review about This movie!</a></div>
	 

	     </div>
	     <?php echo movie_suggestion($suggestion2 ,$im_sug2);?>


	 </div>
     
     

  	 
	 <div class="row">
	 	<div class="col-md-2">
	 	</div>
	 	<div class="col-md-4">
                <iframe width="300" height="180" src="<?php echo $trailer ?>  " allowfullscreen></iframe>    
        </div>
        <?php
        $ut = $_SESSION['usertype'];
        if($ut=="2")
        {
        	 echo 
        	"<div style=\" color:red;\">".
	 		"<h3>VIP ACCESS! </h3>".
	 	"</div>".
	 	"<div class =\"col-md-3\"  style = \"border:2px groove grey ; border-radius: 5px ; background-color: #3b5998; width: 300px;height: 60px;\">".	
	 	"<div style=\"padding:10px; \" link=\"red\">".
	 			"<a href=\"flex.php\" class=\"class1\">See Statistics and charts! </a>".
	 	"</div>".
        "</div>";

        }	

        ?>
        

	 	
	 </div>
	 <div class="row">
	 	
	 </div>
   </body>
</html>
			