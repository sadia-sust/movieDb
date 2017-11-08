<?php

?>

<html>

<head>
	<title></title>

</head>
<body>
                
<div class="col-md-2">
</div>
<div class="col-md-4" style = "border:2px double #444444 ; border-radius: 25px">

	<img src="<?php echo $_SESSION['img']?>" id = "img" style ="width: 100px; height: 100px;    border: 3px solid #73AD21; border-radius: 25px;">
	<a href="MovieFromSearch.php?data=<?php echo $_SESSION[$ss]?>"> <?php echo $_SESSION[$ss]?> </a>	
</div>

</body>
</html>