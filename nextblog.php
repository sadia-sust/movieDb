<?php
	include 'sessionValue.php';
  var_dump($_SESSION);
	if (isset($_GET["nxt"]))
    {
      
      if($_GET["nxt"]=="1")

      $_SESSION['blognext'] = $_SESSION['blognext'] +5;
  else
      $_SESSION['blognext'] = $_SESSION['blognext'] -5;
  	
header("Location: blog.php");
//header("Location: testnext.php");
    }
    echo $_SESSION['blognext'];



?>