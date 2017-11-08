<?php
			include_once 'dbconfig.php';
			require 'sessionValue.php';


				 $un = $_SESSION['blog_un'];
				 $id = $_SESSION['blog_id'];
				 $cur = $_SESSION['blog_cur'];
				 //echo $un ."\n" .$id;
		if( $_SESSION['username'] =="Guest")
				{

					$page = "Location: blogdetails.php?page=".$cur;
				//echo $page;
				header("$page");

				}
				else
			{
				if (isset($_GET["ct"]))
			    {
			      
			      $val = $_GET["ct"];

			    }
				$query2 = "SELECT username FROM like_counter WHERE  Blog_id = '$id' and username = '$un'";
				$query_run2 = mysql_query($query2);
				$row = mysql_num_rows($query_run2);
				if($row ==0)								
				$query = "INSERT INTO like_counter( Blog_id, username, like_dislike) VALUES ('$id','$un',$val)";
				else
				$query =	"UPDATE like_counter SET like_dislike= '$val' WHERE Blog_id = $id and username = '$un';";
			//echo $query;
				$query_run = mysql_query($query);
			$page = "Location: blogdetails.php?page=".$cur;
			echo $page;
				header("$page");
			}	
				

				//echo mysql_num_rows($query_run);			
?>