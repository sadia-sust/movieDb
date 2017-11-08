<?php
	include 'dbconfig.php';

	$mov = $_SESSION['test'];


	$sql_query= "SELECT ActorName, RolePlay FROM Cast where MovieName = '$mov' and priority < 3 ";
	$query_run = mysql_query($sql_query);
	$row = mysql_num_rows($query_run);
	//save actor name and roles is array
	$act1 = mysql_result($query_run,0, 'ActorName');
	$act2 = mysql_result($query_run,1, 'ActorName');
	$sql_query= "SELECT Genre FROM m_genre where  Movie_Name = '".$mov."'";
	$query_run = mysql_query($sql_query);
	$row = mysql_num_rows($query_run);
	//save actor name and roles is array
	$mov_gen = mysql_result($query_run,0, 'Genre');
	$sql_query_director= "SELECT director FROM Movie where MOvie_Name = '$mov'";
	$query_director = mysql_query($sql_query_director);
	$dir = mysql_result($query_director,0,'director');
	

	$query_best = "SELECT movie.Movie_Name from movie ". 
	"where movie.Movie_Name != '".$mov."'".   
	"and movie.Movie_Name  IN (SELECT MovieName from cast where ActorNAme = '".$act1."'  or ActorNAme = '". $act2."' ) ".
	"AND movie.movie_Name IN (".
	"SELECT Movie_Name from m_genre where  Genre = '".$mov_gen."')".
	 "and (movie.director = '".$dir."')";
	 //echo "best".$query_best."\n";
	$query_run = mysql_query($query_best);
 	$rows = mysql_num_rows($query_run);
     if($rows >=2)
     {
        $suggestion1 = mysql_result($query_run, 0 ,  'Movie_Name');
        $suggestion2 = mysql_result($query_run, 1 ,  'Movie_Name');

     }
     else
     {
     	$query_avg = "SELECT movie.Movie_Name from movie ". 
		"where movie.Movie_Name != '".$mov."'".   
		"and movie.Movie_Name  IN (SELECT MovieName from cast where ActorNAme = '".$act1."'  or ActorNAme = '". $act2."' ) ".
		"AND movie.movie_Name IN (".
		"SELECT Movie_Name from m_genre where  Genre = '".$mov_gen."')";
	//	 	 echo "avr".$query_avg."\n";
		 $query_run = mysql_query($query_avg);
	 	$rows = mysql_num_rows($query_run);
	     if($rows >=2)
	     {
	        $suggestion1 = mysql_result($query_run, 0 ,  'Movie_Name');
	        $suggestion2 = mysql_result($query_run, 1 ,  'Movie_Name');

	     }
	     else
	     {

		 			 	$query_worst2 = "SELECT MovieName FROM cast where MovieName !='$mov' and ActorName = '$act1'";
		 	//echo $query_worst2;    
		    $query_run2 = mysql_query($query_worst2);
			$rows2 = mysql_num_rows($query_run2);	     
		    if($rows2>=1)
		     {
		        $suggestion2 = mysql_result($query_run2, 0 ,  'MovieName');
		        $query_worst = "SELECT Movie_name FROM m_genre WHERE Genre = '$mov_gen' and Movie_Name != '$mov' and Movie_Name != '$suggestion2'";
			 	$query_run = mysql_query($query_worst);
				$rows = mysql_num_rows($query_run);

				if($rows>=1 )
		        $suggestion1 = mysql_result($query_run, 0 ,  'Movie_Name');
		        else
		        {
		        $suggestion1 = mysql_result($query_run, 0 ,  'Movie_Name');
		        $suggestion2 = mysql_result($query_run, 0 ,  'Movie_Name');
		        }

		     }
		     else
		     	{
		     	$query_worst = "SELECT Movie_name FROM m_genre WHERE Genre = '$mov_gen' and Movie_Name != '$mov' ";
			 	$query_run = mysql_query($query_worst);
		        
		        $suggestion1 = mysql_result($query_run, 0 ,  'Movie_Name');
		        $suggestion2 = mysql_result($query_run, 1 ,  'Movie_Name');
		        }
		       
		       

		    


	     }




     }
     $image_query= "SELECT Image_Link , Description ,Trailer  FROM Movie_Details where Movie_Name = '$suggestion2' ";
   //  echo $suggestion1;
	$image_query_run = mysql_query($image_query);
	$im_sug2 = mysql_result($image_query_run,0,'Image_Link');
	$image_query= "SELECT Image_Link , Description ,Trailer  FROM Movie_Details where Movie_Name = '$suggestion1' ";
	$image_query_run = mysql_query($image_query);
	$im_sug1 = mysql_result($image_query_run,0,'Image_Link');





?>