<?php
	
	function func1($liked, $disliked,$id)
	{

		echo "<div style= \"border:2px groove #3b5998 ; border-radius: 5px; width : 300px;color: white;background: #3b5998 ;box-shadow: 5px 17px 21px 5px grey;margin-bottom: 30px;\">".
		"<h3>".
	  	$_SESSION['title']. 
	  "</h3>".
		"<p>".	  
	  "Username:   ".$_SESSION['userName']. 
	  "</p>".
	  "<p>Uploaded in"."   ".$_SESSION['uploadedTime']. 
	  "</p>".
	  "<p>".substr($_SESSION['description'],0, 10)."...."."</p>".
	  "<form method=\"GET\">".
	  "<a href = \"blogdetails.php?page=".$id."\"> see full blog</a>".
	  "</form>".
	  "<div>".
      $liked.
      "<img src=\"like.jpg\"  style=\"width:30px;height:30px;\">".
      "<img src=\"dislike.png\"  style=\"width:30px;height:30px;\">".
      $disliked.
	"</div>".
	  "<hr>".
	"</div>";
	}

?>
