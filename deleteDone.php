<?php
	include_once 'dbconfig.php';
    require 'sessionValue.php';


		if(isset($_GET["data"]))
		{

			$_SESSION['test'] = $_GET["data"];
		    $movieName = $_SESSION['test'];
             //echo 'started..........'.'$movieName';
			$delete_query = "DELETE FROM movie WHERE Movie_Name = '$movieName' ";
		    mysql_query($delete_query);
            
            $delete_query = "DELETE FROM movie_details WHERE Movie_Name = '$movieName' ";
		    mysql_query($delete_query);

		    $delete_query = "DELETE FROM cast WHERE MovieName = '$movieName' ";
		    mysql_query($delete_query);

		    $delete_query = "DELETE FROM rating WHERE movie = '$movieName' ";
		    mysql_query($delete_query);

           //  echo 'amr matha r amr mondu '.'$moviename';
		     header("Location: profile.php"); 
			//header("Location: moviePage.php?seemore=NO");
		}

?>
