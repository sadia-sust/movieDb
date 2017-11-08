<?php
	include 'sessionValue.php';
	$row = 6;
	if(isset($_SESSION['blognext']))
  {
    $st = $_SESSION['blognext'];
  }
  else 
    $st = 0;
  if($st>$row)
    $st = $row - ($row%5);
  if($st<0)
    $st = 0;
 $_SESSION['blognext'] = $st;
	echo $st."is".$row;


?>
<html>
	<body>
		 <div>
  Showing <?php echo $row." out of ".$row." blogs.";?>
  <a href="nextblog.php?nxt=2">Previous Page</a> |
  <a href="nextblog.php?nxt=1">Next Page</a>
  </div>  
	</body>
</html>