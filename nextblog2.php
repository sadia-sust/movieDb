<?php
	include 'sessionValue.php';
  var_dump($_SESSION);
	if (isset($_GET["nxt"]))
    {
      
      if($_GET["nxt"]=="1")

      $_SESSION['rnext'] = $_SESSION['rnext'] +5;
  else
      $_SESSION['rnext'] = $_SESSION['rnext'] -5;
  	
header("Location: review.php");
//header("Location: testnext.php");
    }
 //   echo $_SESSION['blognext'];



?>