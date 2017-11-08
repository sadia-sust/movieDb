<?php
	function func2()
	{

		echo "<div style= \"border:2px groove #3b5998 ; border-radius: 5px; width : 300px;color: white;background: #3b5998 ;box-shadow: 5px 17px 21px 5px grey;margin-bottom: 30px;\">".
		"<p>".	  
	  "Username:   ".$_SESSION['userName']. 
	  "</p>".
	  "<p>Uploaded in"."   ".$_SESSION['uploadedTime']. 
	  "</p>".
	  "<p>".substr($_SESSION['description'],0, 10)."...."."</p>".
	  "<form method=\"GET\">".
	  "<a href = \"reviewdetails.php?page=".$_SESSION['i']."\"> see full review</a>".
	  "</form>".
	  "<hr>".
	"</div>";
	}

?>
